@extends('layouts.app')
@section('title','Create')

@section('content')
<div>
    <form action="{{ route('leads.store') }}" method="POST">
        @include('leads._partials.form')
        <button type="submit" class="btn btn-primary">Save</button>
    </from>
</div>
@endsection
