<?php namespace App\Handlers\Events;

use App\Events\UserLoggedIn;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class AuthLoginEventHandler {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  Events  $event
	 * @return void
	 */
	public function handle(UserLoggedIn $event)
	{
		//dd($event->userId);
		 $user = User::find($event->userId);
		 $user->update([
			'last_login' => date('Y-m-d H:i:s'),
		 	]);
	}

}
