<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,

            'email' => $this->email,

            'phone' => $this->phone,

            'company' => $this->company,

            'budget' => $this->budget,

            'source' => $this->source,

            'status' => $this->status,
            'assigned_to' => $this->assigned_to,

            'assigned_user' => $this->whenLoaded(
                'assignedUser',
                fn () => [
                    'id' => $this->assignedUser?->id,
                    'name' => $this->assignedUser?->name,
                    'email' => $this->assignedUser?->email,
                ]
            ),

            'message' => $this->message,

            'created_at' => $this->created_at?->toISOString(),

            'updated_at' => $this->updated_at?->toISOString(),


        ];
    }
}
