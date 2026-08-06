<div>
   <table>
        <thead>
                <th>
                    Sr.No
                </th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Assigned To</th>
                <th>Action</th>
        </thead>
        <tbody>
            {{$leads}}
            @foreach($leads as $lead)
                <tr>
                    <td>{{$lead->email}}</td>
                    <td>{{$lead->phone}}</td>
                    <td>{{$lead->status}}</td>
                    <td>{{$lead->assigned_to }}</td>
                    <td>@can('update', $lead)
                            <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                        @endcan
                    </td>
                    <td>
                        @can('delete', $lead)
                            <form method="POST" action="{{ route('leads.destroy', $lead->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
        </tbody>
   </table>
</div>
