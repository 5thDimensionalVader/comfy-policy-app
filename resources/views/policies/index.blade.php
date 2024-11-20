@extends('layouts.app')

@section('title', 'Policies')

@section('page')
<div>
    <div class="flex justify-between h-16">
        <h2 class="text-2xl font-semibold mb-4">Policies</h2>
        <a href="{{ route('policies.create') }}" class="text-blue-500 hover:underline">Create Policy</a>
        
    </div>
</div>

@endsection