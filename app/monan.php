<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class monan extends Model
{
  protected $table ='monan'; 
	protected $primaryKey = 'id';
	public $timestamps = false;

}
