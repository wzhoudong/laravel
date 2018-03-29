<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Users extends Model
{

	static public function select()
	{
		return DB::table('pic')->find(17);
	}
}
