<?php

namespace App\Listeners;

use App\Events\NewuserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\UserCreatedMail;
use Mail;
class SendWelcomeMailListener
{
    /**
     * Create the event listener.
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
     * @param  \App\Events\NewuserCreated  $event
     * @return void
     */
    public function handle(NewuserCreated $event)
    {
        Mail::to($event->user->email)->cc('abc@gmail.com')->bcc('xyz@gmail.com')->send(new UserCreatedMail($event->user));
    }
}
