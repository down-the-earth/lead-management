@extends('layouts.app')

@section('content')

<div class="row">

    <!-- Lead Details -->
    <div class="col-md-8">

        <div class="card mb-3">
            <div class="card-header">
                Lead Details
            </div>

            <div class="card-body">
                <p><strong>Name:</strong> {{ $lead->name }}</p>
                <p><strong>Email:</strong> {{ $lead->email }}</p>
                <p><strong>Status:</strong> {{ ucfirst($lead->status) }}</p>
                <p><strong>Assigned To:</strong> {{ $lead->assignedUser?->name }}</p>
            </div>
        </div>

        <!-- Add Note -->
        <div class="card mb-3">
            <div class="card-header">
                Add Note
            </div>

            <div class="card-body">

                <form action="{{ route('notes.store', $lead) }}" method="POST">
                    @csrf

                    <textarea
                        name="note"
                        class="form-control"
                        rows="4"
                        placeholder="Write your note..."></textarea>

                    @error('note')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <button class="btn btn-primary mt-3">
                        Add Note
                    </button>
                </form>

            </div>
        </div>

        <!-- Notes -->
        <div class="card">
            <div class="card-header">
                Notes History
            </div>

            <div class="card-body">

                @forelse($lead->notes()->latest()->get() as $note)

                    <div class="border-bottom mb-3 pb-2">

                        <strong>{{ $note->user->name }}</strong>

                        <small class="text-muted">
                            {{ $note->created_at->diffForHumans() }}
                        </small>

                        <p class="mb-0">
                            {{ $note->note }}
                        </p>

                    </div>

                @empty

                    <p>No notes available.</p>

                @endforelse

            </div>
        </div>

    </div>

    <!-- Activity Timeline -->
    <div class="col-md-4">

        <div class="card">
            <div class="card-header">
                Activity Timeline
            </div>

            <div class="card-body">

                @foreach($lead->activities()->latest()->get() as $activity)

                    <div class="mb-3">

                        <strong>{{ $activity->action }}</strong>

                        <p>{{ $activity->description }}</p>

                        <small>{{ $activity->created_at->diffForHumans() }}</small>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection