<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\DB;
use App\Models\Idea;

//index
Route::get('/ideas', function () {
    //$ideas = DB::table('ideas')->get();
    //$ideas = Idea::all();
    //$ideas = Idea::where('state', 'in Arbeit')->get();
    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })
        ->get();

    return view('ideas.index', [
        'ideas' => $ideas
    ]);
});

//show
// Route::get('/ideas/{id}', function ($id) {
//     // $idea = Idea::find($id); //null

//     // if (is_null($idea)) {
//     //     abort(404);
//     // }

//     $idea = Idea::findOrFail($id);

//     return view('ideas.show', [
//         'idea' => $idea
//     ]);
// });
Route::get('/ideas/{idea}', function (Idea $idea) {

    return view('ideas.show', [
        'idea' => $idea
    ]);
});

//edit
Route::get('/ideas/{idea}/edit', function (Idea $idea) {

    return view('ideas.edit', [
        'idea' => $idea
    ]);
});

//update
Route::patch('/ideas/{idea}', function (Idea $idea) {

    $idea->update([
        'description' => request('description')
    ]);

    return redirect("/ideas/{$idea->id}");
});


//store
Route::post('/ideas', function () {
    $idea = request('idea');

    //session()->push('ideas', $idea);

    Idea::create([
        'description' => request('description'),
        'state' => 'in Arbeit'
    ]);

    return redirect('/ideas');
});

//destroy
Route::delete('/ideas/{idea}', function (Idea $idea) {
    $idea->delete();

    return redirect('/ideas');
});
