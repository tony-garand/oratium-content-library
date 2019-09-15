<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
  public function topics()
  {
    return $this->BelongsToMany(Topics::class);
  }
}
