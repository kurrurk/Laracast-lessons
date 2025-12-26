// Object Creational Patterns


class Game {

    #minRange; // private
    #maxRange; // private    
    #maxAttempts; // private

    #guess;
    #message;
    #result;

    constructor ({minRange = 1, maxRange = 10, maxAttempts = 4} = {} ) {

        this.#minRange = minRange;
        this.#maxRange = maxRange;
        this.#maxAttempts = maxAttempts;

    }

    play( ) {

        const secretNumber = Math.floor(Math.random() * (this.#maxRange - this.#minRange + 1)) + this.#minRange;

        const history = [];

        this.#guess = NaN;
        this.#message = `Please enter a number between ${this.#minRange} and ${this.#maxRange}`;
        this.#result = [false, NaN];

        while ( history.length < this.#maxAttempts ) {
            let input = prompt(this.#message);
            this.#guess = Number(input);

            if (isNaN(this.#guess) || this.#guess < this.minRange || this.#guess > this.#maxRange) {
                console.log(`Please enter a valid number from ${this.#minRange} and ${this.#maxRange}`);
                this.#message = `Please enter a number between ${this.#minRange} and ${this.#maxRange}`;
                continue;
            }

            if ( history.indexOf(this.#guess) > -1 ) {
                continue;
            }

            history.push(this.#guess);

            if (this.#guess === secretNumber) {
                console.log('Congrats! You guessed the number.')
                this.#result = [true, history.length];
                break;
            } else if (guess < secretNumber) {
                this.#message = `${this.#guess} is too low.`;
            } else if (guess > secretNumber) {
                this.#message = `${this.#guess} is too high.`;
            }
        }

        if ( this.#result[0] ) {
            alert(`Game Over! The number is ${secretNumber}, and you guessed it, in ${result[1]} attemts.`);
        } else {
            alert(`Game Over! The number is ${secretNumber}, and you didn't guessed it.`)
        }

        console.log(`Guessed numbers are: ${history.join(', ')}`)
    }

}

//factory function
const createGame = function ( {minRange = 1, maxRange = 10, maxAttempts = 4} = {} ) {
    return {
        // minRange,
        // maxRange,
        // maxAttempts,
        play( ) {

            const secretNumber = Math.floor(Math.random() * (maxRange - minRange + 1)) + minRange;

            const history = [];

            let guess = NaN;
            let message = `Please enter a number between ${minRange} and ${maxRange}`;
            let result = [false, NaN];

            while ( history.length < maxAttempts ) {
                let input = prompt(message);
                guess = Number(input);

                if (isNaN(guess) || guess < minRange || guess > maxRange) {
                    console.log(`Please enter a valid number from ${minRange} and ${maxRange}`);
                    message = `Please enter a number between ${minRange} and ${maxRange}`;
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
        },

    } 

}

// game.play();


let easyGame = createGame({maxAttempts: 10});
let narmalGame = createGame();
let hardGame = createGame({maxRange: 100, maxAttempts: 10});
let reallyHardGame = createGame({maxRange: 100, maxAttempts: 5});

let easyGame2 = new Game({maxAttempts: 10});
let narmalGame2 = new Game();
let hardGame2 = new Game({maxRange: 100, maxAttempts: 10});
let reallyHardGame2 = new Game({maxRange: 100, maxAttempts: 5});

alert(hardGame2.play === easyGame2.play);
