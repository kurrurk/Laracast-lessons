// Object Creational Patterns

const ui = (function () {
  function getBy(cssSelector) {
    return document.querySelector(cssSelector);
  }

  const form = getBy("#settings-form");
  const optionsCustomElement = getBy("#options-custom");
  const optionsModeElement = getBy("#options-mode");
  const allowDuplicateElement = getBy("#allow-duplicates-checkbox");
  const inputGuessElement = getBy("#guess-input");
  const feedbackElement = getBy("#guess-feedback");
  const historyElement = getBy("#guess-history");

  return {
    get selectedGameType() {
      return form.elements.namedItem("game-type-selector").value;
    },

    get allowDuplicateGuesses() {
      return allowDuplicateElement.checked;
    },

    settings: {
      set disabled(value) {
        const elements = form.elements;

        for (let li = 0; li < elements.length; li++) {
          elements[li].disabled = value;
        }

        // [...form.elements].forEach((element) => {
        //   element.disabled = value;
        // });

        // Array.from(form.elements).forEach((element) => {
        //   element.disabled = value;
        // });

        // Array.prototype.forEach.call(form.elements, (element) => {
        //   element.disabled = value;
        // });
      },
    },

    changeGameType(id) {
      if (optionsCustomElement.id === id) {
        console.log(id);

        optionsCustomElement.className = "inline";
        optionsModeElement.className = "hidden";
      } else {
        console.log(id);

        optionsModeElement.className = "inline";
        optionsCustomElement.className = "hidden";
      }
    },

    getGuess() {
      return parseInt(inputGuessElement.value);
    },

    reset() {
      this.resetHistory;
      this.resetGuess;
      this.showFeedback("");
    },

    resetGuess() {
      inputGuessElement.value = "";
      inputGuessElement.focus();
    },

    resetHistory() {
      historyElement.innerHTML = "";
    },

    updateHistory(result) {
      historyElement.innerHTML = `<li>${result}</li>`;
    },

    getGuessElement() {
      return inputGuessElement;
    },

    showFeedback(message) {
      feedbackElement.innerHTML = message;
    },
  };
})();

class Game {
  #minRange; // private
  #maxRange; // private
  #maxAttempts; // private
  #allowDuplicateGuesses; // private

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

    this.#maxAttempts = Game.initRangeValues({
      value: maxAttempts,
      lowerBounds: 1,
    });

    this.#allowDuplicateGuesses = allowDuplicateGuesses;
    this.history = [];
    this.secretNumber =
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
    if (guess === this.secretNumber) {
      return "correct!";
    } else if (guess < this.secretNumber) {
      return "too low.";
    } else if (guess > this.secretNumber) {
      return "too high.";
    }

    console.log(this.#message);

    return false;
  }

  play() {
    const history = [];

    this.#guess = NaN;
    this.#message = `Please enter a number between ${this.#minRange} and ${
      this.#maxRange
    }`;
    this.#result = [false, NaN];

    while (history.length < this.#maxAttempts) {
      if (!this.#allowDuplicateGuesses) {
        if (this.history.indexOf(this.#guess) > -1) {
          return;
        }
      }

      this.history.push(this.#guess);

      if (this.checkGuess(this.#guess)) {
        this.#result = [true, history.length];
        break;
      }
    }

    if (this.#result[0] !== "cancel") {
      if (this.#result[0]) {
        return `Game Over! The number is ${
          this.secretNumber
        }, and you guessed it, in ${this.#result[1]} attemts.`;
      } else {
        return `Game Over! The number is ${this.secretNumber}, and you didn't guessed it.`;
      }

      console.log(`Guessed numbers are: ${history.join(", ")}`);
    }
  }
}

function createLiElement({ content, classes }) {
  const element = document.createElement("li");
  const textNode = document.createTextNode(content);

  if (classes) {
    element.classList.add(classes);
  }

  element.appendChild(textNode);

  return element;
}

let game;

document.addEventListener("readystatechange", (event) => {
  if (document.readyState === "complete") {
    document.addEventListener("click", (event) => {
      if (event.target.name !== "game-type-selector") {
        return;
      }

      ui.changeGameType(event.target.value);
    });

    document.addEventListener("keydown", (event) => {
      if (event.target.parentNode.id !== "options-custom") {
        return;
      }

      if (event.target.id.indexOf("title") > -1) {
        return;
      }

      const allowedKeys = [
        "Backspace",
        "ArrowLeft",
        "ArrowRight",
        "Delete",
        "Tab",
      ];

      if (
        allowedKeys.includes(event.key) ||
        (event.key >= "0" && event.key <= "9")
      ) {
        return;
      } else {
        event.preventDefault();
      }
    });

    const settingsForm = document.getElementById("settings-form");

    function getBy(cssSelector) {
      return document.querySelector(cssSelector);
    }

    settingsForm.addEventListener("submit", (event) => {
      event.preventDefault();

      let titleElement = getBy("#input-title");
      let minRangeElement = getBy("#input-min-range");
      let maxRangeElement = getBy("#input-max-range");
      let maxAttemptsElement = getBy("#input-max-attempts");
      let gameLevelElement = getBy("#game-level");
      const gameAreaElement = getBy("#game-area");

      const submitterName = event.submitter.name;
      const allowDuplicateGuesses = ui.allowDuplicateGuesses;

      if (submitterName === "play-game") {
        let title = titleElement.value;
        let minRange = minRangeElement.value;
        let maxRange = maxRangeElement.value;
        let maxAttempts = maxAttemptsElement.value;

        if (ui.selectedGameType === "options-custom") {
          if (!title || !minRange || !maxRange || !maxAttempts) {
            alert("Please anter all settings");
            return;
          }
        } else {
          // const selectedOptions = gameLevelElement.options[gameLevelElement.selectedIndex];
          const selectedOptions = gameLevelElement.selectedOptions[0];

          minRange = selectedOptions.dataset.minRange;
          maxRange = selectedOptions.dataset.maxRange;
          maxAttempts = selectedOptions.dataset.maxAttempts;
        }

        gameAreaElement.classList.remove("hidden");

        //gameAreaElement.style.display = 'block';

        ui.reset();
        game = new Game({
          minRange,
          maxRange,
          maxAttempts,
          allowDuplicateGuesses,
        });

        ui.settings.disabled = true;
        // easyGame.play();
      } else if (submitterName === "clear-game") {
        event.preventDefault();

        titleElement.value = "";
        minRangeElement.value = "";
        maxRangeElement.value = "";
        maxAttemptsElement.value = "";
        ui.reset();

        gameAreaElement.classList.add("hidden");
        //gameAreaElement.style.display = '';
      } else {
        console.clear();
        console.log(submitterName);
      }
    });

    document.addEventListener("click", (event) => {
      if (event.target.id === "submit-guess") {
        //console.log("Submit guess clicked");
        // get guess
        const guess = ui.getGuess();

        // validate the guess
        if (isNaN(guess) || guess < game.minRange || guess > game.maxRange) {
          ui.showFeedback(
            `Please enter a valid number from ${game.minRange} and ${game.maxRange}`
          );
          ui.resetGuess();
          return;
        }

        // check the guess
        const result = game.checkGuess(guess);

        // provide feedback
        ui.showFeedback(`${guess} is ${result}`);

        ui.updateHistory(`${guess} is ${result}`);

        ui.resetGuess();

        //ui.getGuessElement().select();
      } else if (event.target.id === "end-game") {
        ui.settings.disabled = false;
      }
    });

    // const playGameButton = document.getElementById('play-game');

    // playGameButton.addEventListener('click', (event) => {

    //     event.preventDefault();

    //     let title =  document.getElementById('input-title').value;
    //     let minRange =  document.getElementById('input-min-range').value;
    //     let maxRange =  document.getElementById('input-max-range').value;
    //     let maxAttempts =  document.getElementById('input-max-attempts').value;

    //     if (!title || !minRange || !maxRange || !maxAttempts) {
    //         alert('Please anter all settings');
    //         return;
    //     }

    //     let easyGame = new Game({minRange, maxRange, maxAttempts});
    //     easyGame.play();

    // });

    // const clearGameButton = document.getElementById('clear-game');

    // clearGameButton.addEventListener('click', (event) => {

    //     event.preventDefault();

    //     document.getElementById('input-title').value = '';
    //     document.getElementById('input-min-range').value = '';
    //     document.getElementById('input-max-range').value = '';
    //     document.getElementById('input-max-attempts').value = '';

    //     console.clear();

    // })
  }
});
