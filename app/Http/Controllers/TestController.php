<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        echo "<h2>Has : </h2>";
        $posts = Post::has('comments')->get();
        echo "$posts";
        echo "<br>";

        echo "<h2>Has : </h2>";
        $posts = Post::has('comments', '>=', 3)->get();
        echo "$posts";
        echo "<br>";


        echo "<h2>DoesntHave : </h2>";
        $posts = Post::doesntHave('comments')->get();
        echo "$posts";
        echo "<br>";


        echo "<h2>WhereDoesntHave : </h2>";
        $posts = Post::whereDoesntHave('comments', function (Builder $query) {
            $query->where('status', '=', 'active');
        })->get();
        echo "$posts";
        echo "<br>";


        echo "<h2>WithCount :</h2>";
        $posts = Post::withCount('comments')->get();
        echo "$posts";
        echo "<br>";


        echo "<h2> WithCount :</h2>";
        $posts = Post::select(['title', 'Status'])->withCount('comments')->get();
        echo "$posts";
        echo "<br>";


        echo "<h2>  With :</h2>";
        $posts = Post::with('comments')->get();
        echo "$posts";


//        echo "<h2>  With :</h2>";
        /*$posts = Tag::whereHas('posts', function (Builder $query) {
            $query->where('status', '=', 'active');
        })->get();*/

//        echo "<h2>  Without :</h2>";
//        $posts = Post::without('comments')->get();
//        echo "$posts";


    }
}
