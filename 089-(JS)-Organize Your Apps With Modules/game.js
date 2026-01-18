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
      })
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

  checkGuess(guess) {
    if (!this.#allowDuplicateGuesses && this.history.indexOf(guess) > -1) {
      return;
    }

    this.history.push(guess);

    const isCorrect = guess === this.#secretNumber;
    const isLastAttempt = this.#maxAttempts === this.history.length;
    const result = isCorrect
      ? "correst"
      : guess < this.#secretNumber
      ? "too low"
      : "too high";

    document.dispatchEvent(
      new CustomEvent("game-guess", {
        detail: {
          guess,
          result,
          remainningAttempts: this.#maxAttempts - this.history.length,
        },
      })
    );

    if (isCorrect || isLastAttempt) {
      document.dispatchEvent(
        new CustomEvent("game-over", {
          detail: {
            secretNumber: this.#secretNumber,
          },
        })
      );
    }

    console.log(this.#message);

    return false;
  }
}
