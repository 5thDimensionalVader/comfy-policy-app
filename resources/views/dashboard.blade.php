@extends('layouts.app')

@section('title', 'Dashboard')

@section('page')
<h2 class="text-2xl font-semibold mb-4">Dashboard</h2>

<div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
    <div class="relative bg-white pt-5 px-4 pb-2 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
        <div>
            <p class="text-sm font-medium text-gray-500 truncate">Active Policies</p>
        </div>
        <div class="pb-2 flex items-baseline sm:pb-7">
            <p class="text-2xl font-semibold text-gray-900">{{ number_format($policies_active_count) }}</p>
        </div>
    </div>

    <div class="relative bg-white pt-5 px-4 pb-2 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
        <div>
            <p class="text-sm font-medium text-gray-500 truncate">Expiring in 30 Days</p>
        </div>
        <div class="pb-2 flex items-baseline sm:pb-7">
            <p class="text-2xl font-semibold text-gray-900">{{ number_format($policies_expiring_30) }}</p>
        </div>
    </div>
</div>
@endsection