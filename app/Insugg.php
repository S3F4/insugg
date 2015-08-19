<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insugg extends Model
{
	protected $table = "insugg";
	protected $primaryKey = "insuggid";

	public function suggestions()
	{
		return $this->hasMany('\App\Suggestion', 'insuggid');
	}

	public function tagsOfInsuggs()
	{
		return $this->hasManyThrough('\App\Tagmap','\App\Tag','insuggid','tagid');
	}
}
