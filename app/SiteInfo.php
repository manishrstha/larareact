<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
	protected $table = 'site_info';
    protected $fillable = ['phone_number','mail_address','facebook','google','twitter','instagram','address','footer_links','company_name','logo','footer2_links'];
}
