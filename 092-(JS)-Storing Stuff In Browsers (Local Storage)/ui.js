import Game from "./game.js";

let game;

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

const gameAreaElement = getBy("#game-area");

export const ui = {
  get selectedGameType() {
    return form.elements.namedItem("game-type-selector").value;
  },

  get allowDuplicateGuesses() {
    return allowDuplicateElement.checked;
  },

  gameArea: {
    set disabled(value) {
      const elements = gameAreaElement.querySelectorAll("input, button");

      for (let ii = 0; ii < elements.length; ii++) {
        elements[ii].disabled = value;
      }
    },
    hide() {
      gameAreaElement.classList.add("hidden");
    },
    show() {
      gameAreaElement.classList.remove("hidden");
    },
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
    this.resetHistory();
    this.resetGuess();
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
    historyElement.innerHTML += `<li>${result}</li>`;
  },

  getGuessElement() {
    return inputGuessElement;
  },

  showFeedback(message) {
    feedbackElement.innerHTML = message;
  },
};

export function init() {
  if (Game.hasSavedGame()) {
    if (confirm("Do you want to continue the saved game?")) {
      game = Game.loadSavedGame();

      ui.gameArea.show();
      ui.gameArea.disabled = false;
      ui.settings.disabled = false;

      game.history.forEach((value) => ui.updateHistory(value));
    }
  }

  document.addEventListener("click", (event) => {
    if (event.target.id === "submit-guess") {
      event.target.dispatchEvent(
        new CustomEvent("ui:submit-guess", {
          bubbles: true,
          detail: {
            guess: ui.getGuess(),
            game,
          },
        })
      );
    } else if (event.target.id === "end-game") {
      document.dispatchEvent(new Event("ui:end-game"), {
        bubbles: true,
      });
    }
  });

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

  document
    .getElementById("settings-form")
    .addEventListener("submit", (event) => {
      event.preventDefault();

      let titleElement = getBy("#input-title");
      let minRangeElement = getBy("#input-min-range");
      let maxRangeElement = getBy("#input-max-range");
      let maxAttemptsElement = getBy("#input-max-attempts");
      let gameLevelElement = getBy("#game-level");

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
          const selectedOptions =
            gameLevelElement.options[gameLevelElement.selectedIndex];
          //const selectedOptions = gameLevelElement.selectedOptions[0];

          minRange = selectedOptions.dataset.minRange;
          maxRange = selectedOptions.dataset.maxRange;
          maxAttempts = selectedOptions.dataset.maxAttempts;
        }

        ui.gameArea.show();

        ui.reset();

        game = new Game({
          minRange,
          maxRange,
          maxAttempts,
          allowDuplicateGuesses,
        });
        ui.settings.disabled = true;
        ui.gameArea.disabled = false;

        ui.settings.disabled = true;
        // easyGame.play();
      } else if (submitterName === "clear-game") {
        event.preventDefault();

        titleElement.value = "";
        minRangeElement.value = "";
        maxRangeElement.value = "";
        maxAttemptsElement.value = "";
        ui.reset();

        ui.gameArea.hide();
      } else {
        console.clear();
        console.log(submitterName);
      }
    });
}
