<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NPTask extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nptask';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
