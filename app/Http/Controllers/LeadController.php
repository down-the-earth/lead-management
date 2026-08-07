<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Lead;
use App\Models\User;
use App\Services\LeadService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    use AuthorizesRequests;
    public function __construct(
    private LeadService $leadService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $query = Lead::with('assignedUser');

        if  (auth()->user()->role !== 'admin') {
            $query->where('assigned_to', auth()->id());
        }

        $leads = $query->latest()->paginate(10);

        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'member')->get();

        return view('leads.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeadRequest  $request)
    {
        try{
            $this->leadService->create($request->validated());

            return redirect()
                ->route('leads.index')
                ->with('success', 'Lead created successfully.');

        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());

        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        $this->authorize('update', $lead);

    $users = User::where('role', 'member')->get();

    return view('leads.edit', compact('lead', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadRequest  $request, Lead $lead)
    {
        $this->authorize('update', $lead);

        $this->leadService->update(
            $lead,
            $request->validated()
        );
    
        return redirect()
            ->route('leads.index')
            ->with('success', 'Lead updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $this->authorize('delete', $lead);

        $lead->delete();
    
        return back()->with('success', 'Lead deleted.');
    }
}
