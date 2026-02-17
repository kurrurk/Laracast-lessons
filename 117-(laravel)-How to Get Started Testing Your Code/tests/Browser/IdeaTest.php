<?php

use App\Models\User;

it('shows all ideas', function () {
    // given I'm signed in
    $this->actingAs($user = User::factory()->create());
    // and I have one idea in the db
    $user->ideas()->create([
        'description' => "Mach ein test!",
        // 'state' => 'in Arbeit'
    ]);
    // when i wisit /ideas
    visit('/ideas')
        ->assertSee('Mach ein test!');
    // I should see my one idea
});

it('shows a single idea', function () {
    // given I'm signed in
    $this->actingAs($user = User::factory()->create());
    // and I have one idea in the db
    $ideas = $user->ideas()->create([
        'description' => "Mach ein test!",
        // 'state' => 'in Arbeit'
    ]);
    // when i wisit /ideas
    visit('/ideas/' . $ideas::first()->id)
        ->assertSee('Mach ein test!');
});

it('shows an edit form to update an idea', function () {
    $this->actingAs($user = User::factory()->create());
    // and I have one idea in the db
    $ideas = $user->ideas()->create([
        'description' => "Mach ein test!",
        // 'state' => 'in Arbeit'
    ]);
    // when i wisit /ideas
    visit('/ideas/' . $ideas::first()->id)
        ->press('@edit-button')
        ->assertSee('Edit Your Idea')
        ->assertSee(text: 'Mach ein test!');
});
