<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLeadRequest;
use App\Http\Resources\LeadResource;
use App\Models\Lead;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $query = Lead::query()->with('assignedUser');

        // Authorization filtering
        if($user->role === 'member'){
            $query->where('assigned_to',$user->id);
        }

        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Assigned user filter
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('assigned_to')
            && $user->role === 'admin'
        ) {
            $query->where(
                'assigned_to',
                $request->assigned_to
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");

            });
        }

        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $perPage = min(
            $request->integer('per_page', 10),
            100
        );

        $leads = $query
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return LeadResource::collection($leads);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    
    public function show(Request $request, Lead $lead)
    {
        $this->authorize('view', $lead);

        $lead->load([
            'assignedUser',
            'notes.user',
            'activities.user',
        ]);

        return new LeadResource($lead);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadRequest $request,Lead $lead) {
        $this->authorize('update', $lead);

        $lead->update($request->validated());

        $lead->load('assignedUser');

        return new LeadResource($lead);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
