<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class khuyenmai extends Model
{
  protected $table ='khuyenmai'; 
	protected $primaryKey = 'id';
	public $timestamps = false;

}
