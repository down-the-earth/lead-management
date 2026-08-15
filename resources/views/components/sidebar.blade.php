
<div class="list-group">

    <a href="{{ route('dashboard') }}" class="list-group-item">
        Dashboard
    </a>

    <a href="{{ route('leads.index') }}" class="list-group-item">
        Leads
    </a>

        @can('viewAny',\App\Models\User::class)
    <a href="#" class="list-group-item">
        Users
    </a>
    @endcan

</div>