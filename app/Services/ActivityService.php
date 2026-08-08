<?php

namespace App\Services;

use App\Models\Lead;

class ActivityService
{
          public function log(
        Lead $lead,
        string $action,
        ?string $description = null
    ): void
    {
        $lead->activities()->create([

            'user_id' => auth()->id(),

            'action' => $action,

            'description' => $description,

        ]);
    }

}