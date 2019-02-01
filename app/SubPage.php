<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPage extends Model
{
	public function page(){
		return $this->belongsTo('App\Page');
	}
	protected $table = 'sub_page';
    protected $fillable = ['page_id','name','image','description'];
}
