import {
  clearGameState,
  getGameState,
  saveGameState,
} from "./server-storage.js";

export default class Game {
  #minRange; // private
  #maxRange; // private
  #maxAttempts; // private
  #allowDuplicateGuesses; // private
  #secretNumber;

  #guess;
  #message;
  #result;

  constructor({
    minRange = 1,
    maxRange = 10,
    maxAttempts = 4,
    allowDuplicateGuesses = false,
  } = {}) {
    this.#minRange = Game.initRangeValues({
      value: minRange,
      lowerBounds: 0,
      upperBounds: maxRange,
    });

    this.#maxRange = Game.initRangeValues({
      value: maxRange,
      lowerBounds: minRange,
    });

    this.#maxAttempts = parseInt(
      Game.initRangeValues({
        value: maxAttempts,
        lowerBounds: 1,
      }),
    );

    this.#allowDuplicateGuesses = allowDuplicateGuesses;
    this.history = [];
    this.#secretNumber =
      Math.floor(Math.random() * (this.#maxRange - this.#minRange + 1)) +
      this.#minRange;
  }

  get minRange() {
    return this.#minRange;
  }

  get maxRange() {
    return this.#maxRange;
  }

  get maxAttempts() {
    return this.#maxAttempts;
  }

  set minRange(value) {
    this.#minRange = Game.initRangeValues({
      value,
      lowerBounds: 0,
      upperBounds: this.#maxRange,
    });
  }

  set maxRange(value) {
    this.#maxRange = Game.initRangeValues({
      value,
      lowerBounds: this.#minRange,
    });
  }

  set maxAttempts(value) {
    this.#maxAttempts = Game.initRangeValues({
      value,
      lowerBounds: 1,
    });
  }

  // static hasSavedGame() {
  //   return getGameState();
  // }

  static async loadSavedGame() {
    const state = await getGameState();

    if (!state) {
      return null;
    }

    let game = new Game(state);

    game.#secretNumber = state.secretNumber;
    game.history = state.history;

    return game;
  }

  static initRangeValues({ value, lowerBounds, upperBounds = 0 } = {}) {
    let num = Number(value);

    if (isNaN(num)) {
      throw {
        message: "Value must be numeric",
      };
    }

    if (num < lowerBounds) {
      throw {
        message: `Value cannot be less than ${lowerBounds}`,
      };
    }

    if (upperBounds && num > upperBounds) {
      throw {
        message: `Value cannot be less than ${upperBounds}`,
      };
    }

    return num;
  }

  async checkGuess(guess) {
    if (!this.#allowDuplicateGuesses && this.history.indexOf(guess) > -1) {
      return;
    }

    const isCorrect = guess === this.#secretNumber;

    const result = isCorrect
      ? "correst"
      : guess < this.#secretNumber
        ? "too low"
        : "too high";

    this.history.push(`${guess} is ${result}`);
    const isLastAttempt = this.#maxAttempts === this.history.length;

    document.dispatchEvent(
      new CustomEvent("game-guess", {
        detail: {
          guess,
          result,
          remainningAttempts: this.#maxAttempts - this.history.length,
        },
      }),
    );

    if (isCorrect || isLastAttempt) {
      document.dispatchEvent(
        new CustomEvent("game-over", {
          detail: {
            secretNumber: this.#secretNumber,
          },
        }),
      );

      await clearGameState();
      return;
    }

    await saveGameState({
      minRange: this.#minRange,
      maxRange: this.#maxRange,
      maxAttempts: this.#maxAttempts,
      allowDuplicateGuesses: this.#allowDuplicateGuesses,
      history: this.history,
      secretNumber: this.#secretNumber,
    });

    return false;
  }
}
