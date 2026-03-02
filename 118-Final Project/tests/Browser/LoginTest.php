<?php

use App\Models\User;

test('log in a user', function () {
    $user = User::factory()->create([
        'password' => '123qwertz',
    ]);
    visit('/login')
        ->fill('email', $user->email)
        ->fill('password', '123qwertz')
        ->click('@login-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();
});

test('log out a user', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    visit('/')->click('Log Out');

    $this->assertGuest();
});
