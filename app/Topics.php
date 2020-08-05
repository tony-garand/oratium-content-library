<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Topics extends Model implements ViewableContract
{
    // Viewable for topic viewcount
    use Viewable;

    //sluggable for slug generation to kebab-case
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'topic'
            ]
        ];
    }

    public function articles()
    {
      return $this->BelongsToMany(Articles::class);
    }

    public function lifts()
    {
      return $this->BelongsToMany(Lifts::class);
    }

    public function quotes()
    {
      return $this->BelongsToMany(Quotes::class);
    }

    public function visuals()
    {
      return $this->BelongsToMany(Visuals::class);
    }

    public function videos()
    {
      return $this->BelongsToMany(videos::class);
    }

}
