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

      for (let ii = 0; ii < elements.length; ii++) {
        elements[ii].disabled = value;
      }
    },
  },

  changeGameType(id) {
    if (optionsCustomElement.id === id) {
      optionsCustomElement.className = "inline";
      optionsModeElement.className = "hidden";
    } else {
      optionsCustomElement.className = "hidden";
      optionsModeElement.className = "inline";
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

  showFeedback(message) {
    feedbackElement.innerHTML = message;
  },

  updateHistory(result) {
    historyElement.innerHTML += `<li>${result}</li>`;
  },
};

export async function init() {
  const savedGame = await Game.loadSavedGame();

  if (savedGame) {
    if (confirm("Do you want to continue the saved game?")) {
      game = savedGame;
      ui.gameArea.show();
      ui.gameArea.disabled = false;
      ui.settings.disabled = true;

      game.history.forEach((value) => ui.updateHistory(value));
    }
  }

  document.addEventListener("click", (event) => {
    if (event.target.id === "submit-guess") {
      // get guess

      event.target.dispatchEvent(
        new CustomEvent("ui:submit-guess", {
          bubbles: true,
          detail: {
            guess: ui.getGuess(),
            game,
          },
        }),
      );
    } else if (event.target.id === "end-game") {
      event.target.dispatchEvent(
        new Event("ui:end-game", {
          bubbles: true,
        }),
      );
    }
  });

  document.addEventListener("input", (event) => {
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
      "ArrowLeft",
      "ArrowRight",
      "Backspace",
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
            alert("Please enter all settings");
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
