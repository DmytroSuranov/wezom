<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StaticPage extends Model
{
	public $table = 'static_pages';
	public $primaryKey = 'id';

}
