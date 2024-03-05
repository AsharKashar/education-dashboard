<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    public function test_id($in)
	{
		$messages = Test::find($in);
		if($messages){
			$subject = Subject::find($messages->subject_id);
			if ($subject) {
				return $subject->title;
			}
			else{
				return '';
			}
		}
		else{
			return '';
		}
		
	}
}
