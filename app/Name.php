<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
	protected $fillable = array('firstname', 'lastname'); // Laravel mass assignment filter

	public $timestamps = false; // Switch off Laravel's use of teimstamp fields created_at and updated_at
}
