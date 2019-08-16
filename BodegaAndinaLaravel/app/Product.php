<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['name', 'spec', 'price', 'varietal_id', 'image'];

  protected $dates = ['release_date'];

  protected $datos = ['id'];

  public function varietal()
	{
		return $this->belongsTo(Varietal::class, 'varietal_id', 'id');
	}
}
