<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public static function get_schools()
	{
		if(auth()->user()->admin_type == 'super'){
			$classes = School::where("status", 1)->get();
		}
		else{
			$classes = School::where('id', auth()->user()->school_id)->where("status", 1)->get();
		}
		return $classes;
	}
}
