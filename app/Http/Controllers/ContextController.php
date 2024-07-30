<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\Log;

class ContextController extends Controller
{
    protected $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    public function setContext()
    {
        $post = Post::find(1);
        $comment = new Comment(['body' => 'This is a comment on a post']);
        $post->comments()->save($comment);

        $video = Video::find(1);
        $comment = new Comment(['body' => 'This is a comment on a video']);
        $video->comments()->save($comment);

        foreach ($video->comments as $comment) {
           dd($comment);
        }
        return '<h1>context</h1>';
    }

    public function index()
    {

        return view('welcome');
    }
}
