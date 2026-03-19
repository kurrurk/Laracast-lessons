<?php

use App\Models\User;

it('creates a new idea', function () {
    $this->actingAs($user = User::factory()->create());

    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', 'Eine Demo Idee')
        ->click('@button-status-completed')
        ->fill('description', 'Ein Dummy-Description')
        ->fill('@new-link', 'https://test.de')
        ->click('@submit-new-link-button')
        ->fill('@new-link', 'https://test2.de')
        ->click('@submit-new-link-button')
        ->click('Create')
        ->assertPathIs('/ideas');

    // expect(Idea::count())->tobe(1);
    expect($user->ideas->first())->toMatchArray([
        'title' => 'Eine Demo Idee',
        'status' => 'completed',
        'description' => 'Ein Dummy-Description',
        'links' => ['https://test.de', 'https://test2.de'],
    ]);
});
