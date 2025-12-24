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

    let secretNumber = Math.floor(Math.random() * 10) + 1;

    const maxAttempts = 4;

    const history = [];

    return {

        play() {
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
        },

        reset() {
            secretNumber = Math.floor(Math.random() * 10) + 1;
            history.length = 0;
        }

    } 

})();

game.play();
