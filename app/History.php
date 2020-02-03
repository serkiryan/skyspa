<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class History extends Model
{
    protected $table = 'history';
    public $timestamps = false;
}
