<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = "tag";

	protected $primaryKey = "tagid";

	public function insuggsOfTag()
	{
        return $this->hasManyThrough('\App\Tagmap','\App\Insugg','insuggid','tagid');
	}
}
