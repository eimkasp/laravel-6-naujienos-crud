<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Sukurti foreign key tarp users ir
	// comments lenteliu
	// user_id butinai turi egzistuoti users lenteleje id reiksme

	// jei istrinu useri, turi dingti jo
	// komentarai


	protected $table = 'comments';

	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}
}
