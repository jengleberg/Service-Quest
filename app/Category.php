<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
	// Indicating that this column can be mass assigned
    protected $fillable = ['name'];

    // Defines relationship.  A category has many tickets.
    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }
}
