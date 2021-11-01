<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
	public function scopeIscomplete($query){

		return $query->where('completed', 0);

	}

}
