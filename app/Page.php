<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	public function sub_page(){
		return $this->hasMany('App\SubPage');
	}
	protected $table = 'page';
    protected $fillable = ['page_name','slogan','description'];
}
