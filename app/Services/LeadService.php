<?php

namespace App\Services;

use App\Events\LeadAssigned;
use App\Models\Lead;

class LeadService
{
          public function create(array $data) :Lead
          {
                    $data['created_by']=auth()->id();
                    return Lead::create($data);
          }

          public function update(Lead $lead,array $data):Lead
          {
                    $oldAssignedUser = $lead->assigned_to;
                    $lead->update($data);

                    if(isset($data['assigned_to']) && $oldAssignedUser != $lead->assigned_to && $lead->assigned_to)
                              {
                                        LeadAssigned::dispatch($lead->fresh(),$lead->assigned_to);
                              }
                    return $lead->fresh();

          }

}