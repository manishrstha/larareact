<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
	protected $table = 'home_slider';
    protected $fillable = ['image','slogan','description','link'];
}
