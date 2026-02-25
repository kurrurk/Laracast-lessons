<?php

use Illuminate\Support\Facades\Auth;

test('register a user', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john@example.com')
        ->fill('password', '123qwertz')
        ->click('Create Accaunt')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    expect(Auth::user())->toMatchArray([
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

test('requires a valid email', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'johexample.com')
        ->fill('password', '123qwertz')
        ->click('Create Accaunt')
        ->assertPathIs('/register');
});
