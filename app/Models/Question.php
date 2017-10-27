<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Question extends Model
{
    protected $fillable = ['title','body','user_id','comments_count','followers_count','answers_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topics::class)->withTimestamps();
    }

    public function scopePublished($query)
    {
        return $query->where('is_hidden','F');
    }
}