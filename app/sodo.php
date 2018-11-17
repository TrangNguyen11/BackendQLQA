<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class sodo extends Model
{
  	protected $table ='ban'; 
	protected $primaryKey = 'id';
	public $timestamps = false;

}
