<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visuals extends Model
{
  public function topics()
  {
    return $this->BelongsToMany(Topics::class);
  }
}
