@extends('layouts.app')

@section('content')

<div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Status</th>
            <th>Assigned</th>
            <th>Budget</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($leads as $lead)
        <tr>
            <td>{{ $lead->name }}</td>
            <td>{{ $lead->company }}</td>
            <td>{{ ucfirst(str_replace('_',' ',$lead->status)) }}</td>
            <td>{{ $lead->assignedUser?->name ?? '-' }}</td>
            <td>{{ $lead->budget }}</td>

            <td>
                <a href="{{ route('leads.show',$lead) }}" class="btn btn-info btn-sm">View</a>

                @can('update',$lead)
                <a href="{{ route('leads.edit',$lead) }}" class="btn btn-warning btn-sm">Edit</a>
                @endcan

                @can('delete',$lead)
                <form action="{{ route('leads.destroy',$lead) }}"
                      method="POST"
                      class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
                @endcan
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

{{ $leads->links() }}
   {{$leads->links()}}
</div>
@endsection
