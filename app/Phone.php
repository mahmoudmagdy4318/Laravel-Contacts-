<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'number', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
