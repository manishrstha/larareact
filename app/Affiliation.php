<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
	protected $table = 'affiliation';
    protected $fillable = ['name','image'];
}
