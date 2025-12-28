// Object Creational Patterns


class Game {

    #minRange; // private
    #maxRange; // private    
    #maxAttempts; // private

    #guess;
    #message;
    #result;

    constructor ({minRange = 1, maxRange = 10, maxAttempts = 4} = {} ) {

        this.#minRange = Game.initRangeValues({ 
            value: minRange, 
            lowerBounds: 0, 
            upperBounds: maxRange 
        });

        this.#maxRange = Game.initRangeValues({ 
            value: maxRange, 
            lowerBounds: minRange 
        });
        this.#maxAttempts = Game.initRangeValues({ 
            value: maxAttempts, 
            lowerBounds: 1 
        });

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
            upperBounds: this.#maxRange
        });
    }

    set maxRange(value) {
        this.#maxRange = Game.initRangeValues({
            value,
            lowerBounds: this.#minRange
        });
    }

    set maxAttempts(value) {
        this.#maxAttempts = Game.initRangeValues({
            value,
            lowerBounds: 1
        });
    }


    static initRangeValues({value, lowerBounds, upperBounds = 0} = {}) {
        let num = Number(value);

        if (isNaN(num)) {
            throw {

                message: 'Value must be numeric'

            };
        }

        if (num < lowerBounds) {
            throw {

                message: `Value cannot be less than ${lowerBounds}`

            };
        }

        if (upperBounds && num > upperBounds) {
            throw {

                message: `Value cannot be less than ${upperBounds}`

            };
        }

        return num;
    }

    checkGuess(guess) {
        if (guess === this.secretNumber) {
            console.log('Congrats! You guessed the number.')
            return true;
        } else if (guess < this.secretNumber) {
            this.#message = `${guess} is too low.`;
        } else if (guess > this.secretNumber) {
            this.#message = `${guess} is too high.`;
        }

        console.log(this.#message);

        return false;
    }

    play( ) {

        this.secretNumber = Math.floor(Math.random() * (this.#maxRange - this.#minRange + 1)) + this.#minRange;

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

            if (this.checkGuess(this.#guess)) {
                this.#result = [true, history.length];
                break;
            }
        }

        if ( this.#result[0] ) {
            alert(`Game Over! The number is ${this.secretNumber}, and you guessed it, in ${this.#result[1]} attemts.`);
        } else {
            alert(`Game Over! The number is ${this.secretNumber}, and you didn't guessed it.`)
        }

        console.log(`Guessed numbers are: ${history.join(', ')}`)
    }

}

let easyGame = new Game({maxAttempts: 5});

const gameTitleElement = document.getElementById('game-title');

gameTitleElement.innerHTML = 'Easy Game';

const rulesListElement = document.querySelector('ul.game-list');


if (rulesListElement){
    rulesListElement.innerHTML = `
        <li class="py-1">Min Range: ${easyGame.minRange}</li>
        <li class="py-1">Max Range: ${easyGame.maxRange}</li>
        <li class="py-1">Max Attempts: ${easyGame.maxAttempts}</li>    
    `;
}

const headingElements = document.querySelectorAll('h2,h3');

console.log(headingElements);