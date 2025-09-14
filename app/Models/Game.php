<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['title', 'genre', 'developer_id'];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
