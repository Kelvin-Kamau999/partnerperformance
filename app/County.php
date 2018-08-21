<?php

namespace App;

use App\BaseModel;

class County extends BaseModel
{
	protected $table = 'countys';

	public function subcounty()
	{
		return $this->hasMany('App\Subcounty', 'county');
	}

	// Facilities reporting in both forms
	// 729 currently art
	// Login 
	// Early warning indicators
	// 731 both, those reporting 


}
