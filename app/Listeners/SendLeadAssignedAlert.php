<?php

namespace App\Listeners;

use App\Events\LeadAssigned;
use App\Models\User;
use App\Notifications\LeadAssignedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLeadAssignedAlert
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
    public function handle(LeadAssigned $event): void
    {
        \Log::info('LeadAssigned listener fired',
        [
            'lead_id'=>$event->lead->id,
            'assigned_user_id' => $event->assignedUserId,
        ]
        );
        $user = User::find($event->assignedUserId);
        if(!$user)
            {
                return;
            }
            $user->notify(new LeadAssignedNotification($event->lead));
    }
}
