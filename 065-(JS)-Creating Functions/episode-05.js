//Functions

//immediately invoked function expressions (IIFE)

(function () {

    // closure

    //function declarations

    console.log('sum(1, 2) = ' + sum(1, 2));

    function doNothing() { // return

    }

    let test = doNothing(); // undefined


    function sum(a, b) {

        return a + b;

    }

    //diff(1, 2); // Uncaught ReferenceError: Cannot access 'diff' before initialization

    //function expressions

    //ananymous functions

    let diff = function (a, b) {

        return a - b;

    }

    console.log('diff(15, 2) = ' + diff(15, 2));


    //arrow functions

    let multiply = (a, b) => a + b;

    console.log('multiply(15, 2) = ' + multiply(15, 2));

    let devide = (a,b) => {

        if ( b === 0 ) {

            throw new Error('bcannot be 0')

        }

        return a / b;

    }

    console.log('devide(15, 5) = ' + devide(15, 5));

})();


