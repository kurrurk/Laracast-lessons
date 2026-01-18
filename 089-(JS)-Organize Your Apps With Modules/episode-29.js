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
      ui.updateHistory(`${guess} is ${result}`);
      ui.showFeedback(`You have ${remainningAttempts} remainning attempts.`);
    });

    document.addEventListener("ui:submit-guess", (event) => {
      const { guess, game } = event.detail;

      // validate the guess
      if (isNaN(guess) || guess < game.minRange || guess > game.maxRange) {
        ui.showFeedback(
          `Please enter a valid number from ${game.minRange} and ${game.maxRange}`
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
