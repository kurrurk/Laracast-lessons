<?php

use App\Models\Idea;
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
        ->fill('@new-step', 'Mach Etwas')
        ->click('@submit-new-step-button')
        ->fill('@new-step', 'Mach noch Etwas')
        ->click('@submit-new-step-button')
        ->click('Create')
        ->assertPathIs('/ideas');

    // expect(Idea::count())->tobe(1);
    expect($idea = $user->ideas->first())->toMatchArray([
        'title' => 'Eine Demo Idee',
        'status' => 'completed',
        'description' => 'Ein Dummy-Description',
        'links' => ['https://test.de', 'https://test2.de'],
    ]);

    expect($idea->steps)->toHaveCount(2);
});

it('edits an existing idea', function () {
    $this->actingAs($user = User::factory()->create());

    $idea = Idea::factory()->for($user)->create();

    visit(route('idea.show', $idea))
        ->click('@edit-idea-button')
        ->fill('title', 'Eine Demo Idee')
        ->click('@button-status-completed')
        ->fill('description', 'Ein Dummy-Description')
        ->fill('@new-link', 'https://test.de')
        ->click('@submit-new-link-button')
        ->fill('@new-link', 'https://test2.de')
        ->click('@submit-new-link-button')
        ->fill('@new-step', 'Mach Etwas')
        ->click('@submit-new-step-button')
        ->fill('@new-step', 'Mach noch Etwas')
        ->click('@submit-new-step-button')
        ->click('Create')
        ->assertPathIs('/ideas');

    // expect(Idea::count())->tobe(1);
    expect($idea = $user->ideas->first())->toMatchArray([
        'title' => 'Eine Demo Idee',
        'status' => 'completed',
        'description' => 'Ein Dummy-Description',
        'links' => ['https://test.de', 'https://test2.de'],
    ]);

    expect($idea->steps)->toHaveCount(2);
});
