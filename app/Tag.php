<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = "tag";

	protected $primaryKey = "tagid";

	public function insuggs()
	{
        return $this->hasManyThrough('\App\Insugg','\App\Tagmap','tagid','insuggid');
	}
}
