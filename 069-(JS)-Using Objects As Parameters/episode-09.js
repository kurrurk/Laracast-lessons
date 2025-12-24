// Object Basics

let person = {};

person.firstName = 'John';

person['lastName'] = 'Doe';

person.getFullName = function() {

    return `${this.firstName} ${this.lastName}`;

};

console.log('person:');

console.log(person);

console.log(`person's full name: ${person.getFullName()}`);

let person2 = {

    firstName: 'Mary', // do not use 'firstName'
    lastName: 'Sue',
    getFullName: function() {

        return `${this.firstName} ${this.lastName}`;

    },

};

console.log('person2:');

console.log(person);

console.log(`second person's full name: ${person.getFullName()}`);

const game = (function () {

    // let obj = {
    //     minRange: 10, 
    //     maxRange: 40, 
    //     maxAttempts: 20
    // };

    // play(obj)

    return {

        play( options = {} ) {

            if (typeof options.minRange === 'undefined') {

                options.minRange = 1;

            }

            if (typeof options.maxRange === 'undefined') {

                options.maxRange = 10;

            }

            if (typeof options.maxAttempts === 'undefined') {

                options.maxAttempts = 4;

            }

            const minRange = options.minRange;
            const maxRange = options.maxRange;
            const maxAttempts = options.maxAttempts;

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

})();

game.play();
