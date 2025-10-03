<?php

namespace App\Listeners;

use App\Models\UserActivity;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        if ($event->user) {
            UserActivity::where('user_id', $event->user->id)
                ->latest('logged_in_at')
                ->first()?->update([
                    'logged_out_at' => now(),
                ]);
        }
    }
}
