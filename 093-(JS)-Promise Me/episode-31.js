// Modules

import { ui, init } from "./ui.js";

init();

function createLiElement({ content, classes }) {
  const element = document.createElement("li");
  const textNode = document.createTextNode(content);

  if (classes) {
    element.classList.add(classes);
  }

  element.appendChild(textNode);

  return element;
}

document.addEventListener("readystatechange", (event) => {
  if (document.readyState === "complete") {
    document.addEventListener("game-over", (event) => {
      const secretNumber = event.detail.secretNumber;

      ui.showFeedback(`Game over! The secret number ist ${secretNumber}.`);
      ui.settings.disabled = false;
      ui.gameArea.disabled = true;
    });

    document.addEventListener("game-guess", (event) => {
      const { guess, result, remainningAttempts } = event.detail;

      const json = JSON.stringify(event.detail);
      console.log(json);

      const obj = JSON.parse(json);
      console.log(obj);

      ui.updateHistory(`${guess} is ${result}`);
      ui.showFeedback(`You have ${remainningAttempts} remainning attempts.`);
    });

    document.addEventListener("ui:submit-guess", (event) => {
      const { guess, game } = event.detail;

      // validate the guess
      if (isNaN(guess) || guess < game.minRange || guess > game.maxRange) {
        ui.showFeedback(
          `Please enter a valid number from ${game.minRange} and ${game.maxRange}`,
        );
        ui.resetGuess();
        return;
      }

      // check the guess
      game.checkGuess(guess);

      ui.resetGuess();
    });

    document.addEventListener("ui:end-game", () => {
      ui.settings.disabled = false;
    });
  }
});
