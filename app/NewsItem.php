<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    //
	protected $table = 'news_items';

	public function comments() {
		return $this->hasMany('App\Comment', 'news_id', 'id');
	}
}
