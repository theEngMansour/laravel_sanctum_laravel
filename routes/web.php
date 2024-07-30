<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Context;
use App\Http\Controllers\ContextController;
use App\Models\Post;
use App\Models\Tag;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/get_context', function () {
    $post = new Post();
    $post->title = 'My First Post';
    $post->save();
    
    // Create a new tag
    $tag = new Tag();
    $tag->name = 'Laravel';
    $tag->save();
    
    // Attach the tag to the post
    $post->tags()->attach($tag->id);
    
    // Retrieve and display tags for the post
    $tags = $post->tags;
    
    dd($tags);
});


Route::get('/set', [ContextController::class, 'setContext']);
Route::get('/set/show', [ContextController::class, 'index']);
