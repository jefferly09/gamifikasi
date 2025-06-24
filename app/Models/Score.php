<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
  protected $guarded = [];

  function student()
  {
    return $this->belongsTo(Student::class);
  }
}
