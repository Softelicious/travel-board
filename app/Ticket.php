<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name', 'description', 'image',
    ];
    protected $table = 'tickets';
}
