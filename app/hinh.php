<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class hinh extends Model
{
  protected $table ='hinh'; 
	protected $primaryKey = 'id';
	public $timestamps = false;

}
