<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	// Indicates that these columns can be mass assigned.
    protected $fillable = [
        'user_id', 'category_id', 'task_id', 'title', 'priority', 'message', 'status'
    ];

    // Defines the relationship that a task belongs to a category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
