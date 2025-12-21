// Scope and Variables

const playGame = (function () {

    const secretNumber = Math.floor(Math.random() * 10) + 1;

    const maxAttempts = 4;

    return function playGame() {

        let guess = NaN;
        let message = 'Please enter a number between 1 and 10';
        let result = [false, NaN];

        for ( let attemts = 1; attemts <= maxAttempts; attemts++ ) {
            let input = prompt(message);
            guess = Number(input);

            if (isNaN(guess) || guess < 1 || guess > 10) {
                console.log('Please enter a valid number from 1 and 10');
                continue;
            }

            if (guess === secretNumber) {
                console.log('Congrats! You guessed the number.')
                result = [true, attemts];
                break;
            } else if (guess < secretNumber) {
                message = `${guess} is too low.`;
            } else if (guess > secretNumber) {
                message = `${guess} is too high.`;
            }
        }

        if ( result[0] ) {
            alert(`Game Over! The number is ${secretNumber}, and you guessed it, in ${result[1]} attemts.`)
        } else {
            alert(`Game Over! The number is ${secretNumber}, and you didn't guessed it.`)
        }

    }

})();
