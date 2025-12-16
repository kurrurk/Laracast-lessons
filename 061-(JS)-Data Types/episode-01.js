// alert("Hallo Welt – JavaScript läuft!");

function helloWorld() {

    alert("Hallo Welt – JavaScript function läuft!");

}

function sum(a, b) {

    return a + b;

}

function divide(a, b) {

    if ( b == 0 ) {
        throw new Error('cannot divide by 0');
    } else {
        return a / b;
    }
    
}

function sayHello(name) {

    let message = '  Hallo ' + name + '     ';

    alert(message.trim().toUpperCase());

    return message;

}

// helloWorld();

sayHello('Vasily');