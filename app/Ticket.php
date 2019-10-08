<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Ticket extends Model
{

    use Taggable;

    public function getDataAttribute()
    {
        return explode(',', $this->data);
    }
    protected $fillable = [
        'name', 'description', 'image', 'likes'
    ];
    protected $table = 'tickets';
}
