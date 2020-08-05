<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
  public function topics()
  {
    return $this->BelongsToMany(Topics::class);
  }
}
