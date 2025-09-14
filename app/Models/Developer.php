<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = ['name', 'company_name'];
    
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
