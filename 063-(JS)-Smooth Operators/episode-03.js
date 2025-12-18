// Operators


let str1 = 'Hello'; 
console.log ('str1: ' + str1);

let str2 = str1 + ', World!'; // 'Hello, World!'
console.log ('str2: ' + str2);

let str3 = `${str1}, World!`;
console.log ('str3: ' + str3);

let result = 1 + '2'; // '12'
console.log ('result: ' + result);

let result2 = 1 + 2 + '2'; // '32'
console.log ('result2: ' + result2);

let result3 = 1 + 2 + '2' + [1,2,3]; // '321,2,3'
console.log ('result3: ' + result3);

let result4 = 1 - '2'; // -1
console.log ('result4: ' + result4);

let result5 = 1 < '2'; // true
console.log ('result5: ' + result5);

let result6 = 1 < 'a' || 1 > 'a'; // false
console.log ('result6: ' + result6);

let result7 = 1 > ''; // true
console.log ('result7: ' + result7);

let result8 = 1 > []; // true
console.log ('result8: ' + result8);


//falsy 
console.log ('falsy');

let emptyStr = '';
console.log ('emptyStr: ' + Boolean(emptyStr));

let zeroStr = '0'; // true
console.log ('zeroStr: ' + Boolean(zeroStr));

let zero = 0;
console.log ('zero: ' + Boolean(zero));

let emptyArr = []; // true
console.log ('emptyArr: ' + Boolean(emptyArr));

let undefinedValue = undefined;
console.log ('undefinedValue: ' + Boolean(undefinedValue));

let falseVal = false;
console.log ('falseVal: ' + Boolean(falseVal));



let val1 = 1 == '1'; // true
console.log ('val1: ' + Boolean(val1));

let val2 = 1 === '1'; // false
console.log ('val2: ' + Boolean(val2));

let val3 = 0 == false; // true 
console.log ('val3: ' + Boolean(val3));

let val4 = 0 === false; // false 
console.log ('val4: ' + Boolean(val4));


let val5 = 1 != '1'; // false
console.log ('val5: ' + Boolean(val5));

let val6 = 1 !== '1'; // true
console.log ('val6: ' + Boolean(val6));


let num0 = 1;

let num1 = num0++;
console.log ('num0++: ' + num1);

let num2 = ++num0;
console.log ('++num0: ' + num2);

let num3 = num0--;
console.log ('num0--: ' + num3);

let num4 = --num0;
console.log ('--num0: ' + num4);


let array1 = [1,2,3];
console.log ('array1: [' + array1 + ']');

let array2 = [...array1, 4, 5, 6] // [1, 2, 3, 4, 5, 6]
console.log ('array2 = [...array1, 4, 5, 6]: [' + array2 + ']');

function sum(...args) {
    return args.reduce((a,b) => a + b, 0);
}

console.log("sum(1, 2, 3, 'e'): " + sum(1, 2, 3, 'e'));
console.log("sum(1, 2, 3, 12.3): " + sum(1, 2, 3, 12.3));