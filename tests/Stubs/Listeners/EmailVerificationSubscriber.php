<?php

namespace Deligoez\EventMachine\Tests\Stubs\Listeners;

use Deligoez\EventMachine\Tests\Stubs\Events\EmailVerifiedEvent;

class EmailVerificationSubscriber
{
    public function handleEmailVerified(EmailVerifiedEvent $event)
    {
        $event->user->email_verified->send('verified');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        return [
            EmailVerifiedEvent::class => 'handleEmailVerified',
        ];
    }
}
