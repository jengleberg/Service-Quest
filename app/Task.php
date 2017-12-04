<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	// Indicates that these columns can be mass assigned.
    protected $fillable = [
        'user_id', 'category_id', 'task_id', 'title', 'priority', 'message', 'status', 'location_id',
    ];

    // Defines the relationship that a task belongs to a category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

     public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }
}
