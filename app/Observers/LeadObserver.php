<?php

namespace App\Observers;

use App\Models\Lead;
use App\Services\ActivityService;

class LeadObserver
{
    public function __construct(private ActivityService $activityService)
    {

    }
    /**
     * Handle the Lead "created" event.
     */
    public function created(Lead $lead): void
    {
        $lead->activities()->create([
            'user_id' => auth()->id(),
            'action' => 'Lead Created',
            'description' => 'New lead created.',
        ]);
    }

    /**
     * Handle the Lead "updated" event.
     */
    public function updated(Lead $lead): void
    {
        if ($lead->wasChanged('status')) {

            $lead->activities()->create([
                'user_id' => auth()->id(),
                'action' => 'Status Changed',
                'description' =>
                    'Status changed from '
                    . $lead->getOriginal('status')
                    . ' to '
                    . $lead->status,
            ]);
        }

        if ($lead->wasChanged('assigned_to')) {

            $lead->activities()->create([
                'user_id' => auth()->id(),
                'action' => 'Lead Assigned',
                'description' =>
                    'Lead assignment changed.',
            ]);
        }
    }

    /**
     * Handle the Lead "deleted" event.
     */
    public function deleted(Lead $lead): void
    {
        $lead->activities()->create([
            'user_id' => auth()->id(),
            'action' => 'Lead Deleted',
            'description' => 'Lead was deleted.',
        ]);
    }

    /**
     * Handle the Lead "restored" event.
     */
    public function restored(Lead $lead): void
    {
        //
    }

    /**
     * Handle the Lead "force deleted" event.
     */
    public function forceDeleted(Lead $lead): void
    {
        //
    }
}
