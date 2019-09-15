<?php

namespace App\Http\Controllers;

use App\Topics;
use App\Articles;
use App\Lifts;
use App\Quotes;
use App\Visuals;
use Illuminate\Http\Request;
use Illuminate\View\View;
use CyrildeWit\EloquentViewable\Support\Period;
use DB;

class LiveSearch extends Controller
{
    public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $order = $request->get('order');

      if($order != 'view')
      {
        $topics = Topics::orderBy('Topic', $order)->get();
      } else {
        $topics = Topics::orderByUniqueViews()->get();
      }

      $query = $request->get('query');
      //search query
      if($query != '')
      {
       $data = Topics::where('topic', 'like', '%'.$query.'%')->where('slug', 'like', '%'.$query.'%')->get();
      }
      else
      {
        $data = $topics;
      }


      //updating variables with query data
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        // combining resources associated with topics <-- $resource is the trouble variable
        $resource = $row->articles->count() + $row->lifts->count() + $row->visuals->count() + $row->quotes->count();
        $output .= '<a href="/topics/'.$row->slug.'">'.'<p>'.$row->topic.' <span class="resource">'.$resource.'</span>'.'</p>'.'</a>';
       }
      }
      else
      {
       $output = '<div class="no-search-content">
                   <div class="no-search-inner">
                     <div class="winston-quote"><h3>Nothing in life is so exhilarating as to be shot at without result.</h3>
                     <p>- Winston Churchill</p></div>
                     <div class="clear-query" id="clear-query" value="">Clear Filter</div>
                    </div>
                   <div class="no-search-found"></div>
                  </div>';
      }
      $data = array(
       'table_data'  => $output
      );
      echo json_encode($data);
     }
    }

}
