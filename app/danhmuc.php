<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class danhmuc extends Model
{
  protected $table ='danhmuc'; 
	protected $primaryKey = 'id';
	public $timestamps = false;

}
