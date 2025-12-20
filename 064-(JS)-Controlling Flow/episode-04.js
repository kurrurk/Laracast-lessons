// Flow Control

if (Math.random() * 4 < 3) {

    console.log( 'IF' );

} else if ( Math.random() * 3 < 2 ) {

    console.log( 'ELSE IF' );
 
} else {

    console.log( 'ELSE' );

}


let val = (Math.random() * 4 < 3) ? 'less than' : 'greater then';

console.log('val: ' + val);


console.log('switch case');
let check = "hello";

switch (check) {
    case 'hello' :
        console.log(check + ': 1');
    break;
    case 'hallo' :
        console.log(check + ': 2');
    break;
    case 'привет' :
        console.log(check + ': 3');
    break;
    default :
        console.log(check + ': default');
    break;    
}

console.log('for');
for (let i = 0; i < 10; i++ ) {
    console.log('i: ' + i)
}

console.log('while');
let ii = 0;
while(ii < 10 ) {

    console.log('ii: ' + ii++);

}

console.log('while');
let iii = 0;
do {

    console.log('iii: ' + iii++);

} while(iii < 10 )

console.log('foreach');

let fruits = ['apple','banana','orange','peach'];    

console.log('array');

console.log('for ( let element of array )');

for ( let fruit of fruits ) {
    console.log( 'fruit: ' + fruit );
}

console.log('array.forEach');

fruits.forEach((fruit) => {

    console.log( 'fruit: ' + fruit );

});

console.log('object')

let person = {

    firstName: 'John',
    lastName: 'Doe',

}

for (let prop in person) {
    console.log(`${prop}: ${person[prop]}`);
}