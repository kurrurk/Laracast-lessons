<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\DB;
use App\Models\Idea;

Route::get('/', function () {
    //$ideas = DB::table('ideas')->get();
    //$ideas = Idea::all();
    //$ideas = Idea::where('state', 'in Arbeit')->get();
    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })
        ->get();

    return view('ideas', [
        'ideas' => $ideas
    ]);
});

Route::post('/ideas', function () {
    $idea = request('idea');

    //session()->push('ideas', $idea);

    Idea::create([
        'description' => request('idea'),
        'state' => 'in Arbeit'
    ]);

    return redirect('/');
});

Route::get('/delete-ideas', function () {
    session()->forget('ideas');

    return redirect('/');
});
