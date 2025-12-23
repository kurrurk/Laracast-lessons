// Arrays

let array = new Array(5); // array of 5 elements

let array1 = Array.of(5); // array of 5 elements

let array2 = new Array(5, 2, 345, 'asdasd', null);

let array3 = [1, 23, 435, 'dsfsdf'];

let fromArray = Array.from("Hallo"); // ['H','a','l','l','o']

console.log('let array = new Array(5):');
console.log(array);
console.log('let array = Array.of(5):');
console.log(array1);
console.log(array2);
console.log(array3);
console.log('let fromArray = Array.from("Hallo"):');
console.log(fromArray);

// Scope and Variables

const playGame = (function () {

    const secretNumber = Math.floor(Math.random() * 10) + 1;

    const maxAttempts = 4;

    const history = [];

    return function playGame() {

        let guess = NaN;
        let message = 'Please enter a number between 1 and 10';
        let result = [false, NaN];

        while ( history.length < maxAttempts ) {
            let input = prompt(message);
            guess = Number(input);

            if (isNaN(guess) || guess < 1 || guess > 10) {
                console.log('Please enter a valid number from 1 and 10');
                continue;
            }

            if ( history.indexOf(guess) > -1 ) {
                continue;
            }

            history.push(guess);

            if (guess === secretNumber) {
                console.log('Congrats! You guessed the number.')
                result = [true, history.length];
                break;
            } else if (guess < secretNumber) {
                message = `${guess} is too low.`;
            } else if (guess > secretNumber) {
                message = `${guess} is too high.`;
            }
        }

        if ( result[0] ) {
            alert(`Game Over! The number is ${secretNumber}, and you guessed it, in ${result[1]} attemts.`);
        } else {
            alert(`Game Over! The number is ${secretNumber}, and you didn't guessed it.`)
        }

        console.log(`Guessed numbers are: ${history.join(', ')}`)

    }

})();

playGame();
