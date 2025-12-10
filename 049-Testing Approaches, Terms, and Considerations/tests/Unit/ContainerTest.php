<?php

use Core\Container;

test('it can resolve some thing out of the container ', function () {
    // arrange

    $container = new Container();

    $container -> bind('name', fn() => 'Vasily');

    //act

    $container -> resolve('name');

    //assert/expect

    expect( $container -> resolve('name') ) -> toEqual('Vasily');
});
