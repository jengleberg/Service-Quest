<?php

namespace App;

use Carbon\Carbon;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	// Indicates that these columns can be mass assigned.
    protected $fillable = [
        'user_id', 'category_id', 'task_id', 'title', 'priority', 'message', 'status', 'location_id',
    ];

    // Defines the relationships that tasks have with other models.
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

    // Calling scopeFilter and giving it a list of filters.  
    public function scopeFilter($query,$filters)

    {
        //If there is a month is the where clause
        if(isset($filters['month'])){
            // then where 
        $query->whereMonth('created_at',Carbon::parse($filters['month'])->month);
    }

        if(isset($filters['year'])){

        $query->whereYear('created_at',$filters['year']);
    }

    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) total')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }
}
