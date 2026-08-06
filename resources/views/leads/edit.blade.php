@extends('layouts.app')
@section('title','Edit')

@section('content')
<div>
    <form action="{{ route('leads.update',$lead) }}" method="POST">
        @method('PUT')
        @include('leads._partials.form')

        <button type="submit" class="btn btn-primary">Update</button>
    </from>
</div>
@endsection
