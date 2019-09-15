<?php
namespace App\Http\Controllers;

use App\Jokes;
use Illuminate\Http\Request;
use Illuminate\View\View;
use CyrildeWit\EloquentViewable\Support\Period;

class JokesController extends Controller
{
   public function showJoke()
   {
     $jokes = Jokes::orderBy('Joke', 'asc')->get();

     return view('jokes.show')->with('jokes', $jokes);
  }
}
