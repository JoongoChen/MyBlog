<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    protected $fillable = ['name','bio','questions_count','followers_count'];

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
