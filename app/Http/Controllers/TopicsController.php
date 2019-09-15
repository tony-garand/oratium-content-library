<?php
namespace App\Http\Controllers;

use App\Topics;
use Illuminate\Http\Request;
use Illuminate\View\View;
use CyrildeWit\EloquentViewable\Support\Period;

class TopicsController extends Controller
{
  /**
   * Display the specified Topic Home page.
   */
   public function index()
   {
     //order topic by name asc
     $topics = Topics::orderBy('Topic', 'asc')->get();

     //order topic by View desc for the sidebar
     $topicViews = Topics::orderByUniqueViews()->take(10)->get();

     return view('index', [
        'topics' => $topics,
        'topicViews' => $topicViews
     ]);
   }


   /**
   * Display the Topic.
   */
   public function showTopic($slug)
   {
       $topics = Topics::where('slug', $slug)->first();
       if ($topics != null) {
            //record View
           views($topics)->record();

           return view('topics.show')->with('topics', $topics);

       } else {

         abort(404);

       }
    }
}
