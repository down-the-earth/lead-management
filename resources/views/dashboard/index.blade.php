@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Dashboard</h2>

            <p class="text-muted mb-0">
                Welcome, {{ auth()->user()->name }}
            </p>
        </div>

        <a href="{{ route('leads.create') }}"
           class="btn btn-primary">
            + Add Lead
        </a>

    </div>


    {{-- Statistics --}}

    <div class="row g-3 mb-4">

        <div class="col-md-4 col-lg-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h6 class="text-muted">
                        Total Leads
                    </h6>

                    <h2>
                        {{ $totalLeads }}
                    </h2>

                </div>
            </div>
        </div>


        <div class="col-md-4 col-lg-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h6 class="text-muted">
                        New Leads
                    </h6>

                    <h2>
                        {{ $newLeads }}
                    </h2>

                </div>
            </div>
        </div>


        <div class="col-md-4 col-lg-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h6 class="text-muted">
                        Qualified
                    </h6>

                    <h2>
                        {{ $qualifiedLeads }}
                    </h2>

                </div>
            </div>
        </div>


        <div class="col-md-4 col-lg-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h6 class="text-muted">
                        Won
                    </h6>

                    <h2>
                        {{ $wonLeads }}
                    </h2>

                </div>
            </div>
        </div>

    </div>


    {{-- Lost + Members --}}

    <div class="row g-3 mb-4">

        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h6 class="text-muted">
                        Lost Leads
                    </h6>

                    <h2>
                        {{ $lostLeads }}
                    </h2>

                </div>
            </div>

        </div>


        @if(auth()->user()->role === 'admin')

            <div class="col-md-6">

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <h6 class="text-muted">
                            Team Members
                        </h6>

                        <h2>
                            {{ $members }}
                        </h2>

                    </div>
                </div>

            </div>

        @endif

    </div>


    {{-- Recent Leads --}}

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Recent Leads
            </h5>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>

                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Created</th>
                            <th></th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($recentLeads as $lead)
                            @php
                                $badge = match($lead->status) {
                                    'new' => 'bg-primary',
                                    'contacted' => 'bg-info',
                                    'qualified' => 'bg-warning text-dark',
                                    'proposal_sent' => 'bg-secondary',
                                    'negotiation' => 'bg-dark',
                                    'won' => 'bg-success',
                                    'lost' => 'bg-danger',
                                    default => 'bg-secondary',
                                };
                            @endphp


                            <tr>

                                <td>
                                    {{ $lead->name }}
                                </td>

                                <td>
                                    {{ $lead->company ?? '-' }}
                                </td>

                                <td>
                                    <span class="badge {{ $badge }}">
                                        {{ ucfirst(str_replace('_', ' ', $lead->status)) }}
                                    </span>
                                </td>

                                <td>
                                    {{ $lead->assignedUser?->name ?? '-' }}
                                </td>

                                <td>
                                    {{ $lead->created_at}}
                                </td>

                                <td>
                                    <a href="{{ route('leads.show', $lead) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        View
                                    </a>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6"
                                    class="text-center py-4">

                                    No leads found.

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection