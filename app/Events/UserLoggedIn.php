<?php namespace App\Events;

use App\Events\Event;
use App\User;
use Illuminate\Queue\SerializesModels;

class UserLoggedIn extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */

	public $userId;

	public function __construct($user_id)
	{
		$this->userId = $user_id;
	}

}
