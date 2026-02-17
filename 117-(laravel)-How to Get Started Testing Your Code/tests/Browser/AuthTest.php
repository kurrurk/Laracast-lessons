<?php

use App\Models\User;

it('registers a user', function () {
    // When I visit the registration page
    visit('/register')
        ->fill('name', 'Jane Doe')
        ->fill('email', 'jane@demo.com')
        ->fill('password', '123qwertz')
        ->press('@register-button')
        // I should be on the /ideas page.
        ->assertPathIs('/ideas');

    // Then I should have an account
    expect(User::where('email', 'jane@demo.com')->exists())->toBe(true);
    // And I sould be signed in.
    $this->assertAuthenticated();
});
