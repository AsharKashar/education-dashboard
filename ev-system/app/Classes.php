<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
	//comments table in database
	protected $guarded = [];
	
	// user who commented
	public function students()
	{
		return $this->hasMany('App\User','class_id');
	}
	public function subject()
	{
		return $this->hasMany('App\Subject','class_id');
	}
	public function teacher()
	{
		return $this->belongsTo('App\User','teacher_id');
	}
	public function class_name()
	{
		return $this->belongsTo('App\Classes','class_id');
	}

	public function class_id()
    {
        return $this->hasMany('App\Routine','class_id');
    }
    public function sections()
    {
        return $this->hasMany('App\Sections','class_id');
    }
	
	public function post()
	{
		return $this->belongsTo('App\Posts','on_post');
	}
	public function student($id){

		$stu = User::where('class_id', $id)->where('role', 'student');
		return $stu;
	}
	public static function get_classes()
	{
		if(auth()->user()->admin_type == 'super'){
			$classes = Classes::orderBy('created_at','desc')->get();
		}
		else{
			$classes = Classes::where('school_id', auth()->user()->school_id)->orderBy('created_at','desc')->get();
		}
		return $classes;
	}
	public static function get_class($no)
	{
		if(auth()->user()->admin_type == 'super'){
			$classes = Classes::orderBy('created_at','desc')->take($no)->get();
		}
		else{
			$classes = Classes::where('school_id', auth()->user()->school_id)->orderBy('created_at','desc')->take($no)->get();
		}
		return $classes;
	}
	
    //
}
