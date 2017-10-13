<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tag extends Model
{
	public $table = 'tags';
	public $primaryKey = 'id';

}
