@extends('layouts.app')

@section('title', 'Edit Policy')

@section('page')
<h2 class="text-2xl font-semibold mb-4">Edit Policy</h2>
<div class="max-w-2xl mx-auto p-8">
    <div class="shadow-md rounded-lg p-6">
        <form action="{{ route('policies.update', $policy) }}" method="post" class="space-y-6">
            @csrf
            @method('put')

            <div>
                <label for="policy_number" class="block text-sm font-medium">Policy Number</label>
                <input type="text"
                    name="policy_number"
                    id="policy_number"
                    class="mt-1 block w-full h-8 border-gray-300 shadow-sm focus:border-slate-500
                      focus:ring-slate-500 sm:text-sm dark:text-black"
                    value="{{ old('policy_number', $policy->policy_number) }}">
                @error('policy_number')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="customer_name" class="block text-sm font-medium">Customer Name</label>
                <input type="text"
                    name="customer_name"
                    id="customer_name"
                    class="mt-1 block w-full h-8 border-gray-300 shadow-sm focus:border-slate-500
                      focus:ring-slate-500 sm:text-sm dark:text-black"
                    value="{{ old('customer_name', $policy->customer_name) }}">
                @error('customer_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="start_date" class="block text-sm font-medium">Start Date</label>
                <input type="date"
                    name="start_date"
                    id="start_date"
                    class="mt-1 block w-full h-8 border-gray-300 shadow-sm focus:border-slate-500
                      focus:ring-slate-500 sm:text-sm dark:text-black"
                    value="{{ old('start_date', $policy->start_date ? $policy->start_date->format('Y-m-d') : '') }}">
                @error('start_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="end_date" class="block text-sm font-medium">End Date</label>
                <input type="date"
                    name="end_date"
                    id="end_date"
                    class="mt-1 block w-full h-8 border-gray-300 shadow-sm focus:border-slate-500
                      focus:ring-slate-500 sm:text-sm dark:text-black"
                    value="{{ old('end_date', $policy->end_date ? $policy->end_date->format('Y-m-d') : '') }}">
                @error('end_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="policy_type" class="block text-sm font-medium">Policy Type</label>
                <select name="policy_type"
                    id="policy_type"
                    class="mt-1 block w-full h-8 border-gray-300 shadow-sm focus:border-slate-500
                      focus:ring-slate-500 sm:text-sm dark:text-black"
                    required>
                    <option value="">Select Policy Type</option>
                    <option value="Life" {{ old('policy_type', $policy->policy_type) == 'Life' ? 'selected' : '' }}>Life</option>
                    <option value="Health" {{ old('policy_type', $policy->policy_type) == 'Health' ? 'selected' : '' }}>Health</option>
                    <option value="Auto" {{ old('policy_type', $policy->policy_type) == 'Auto' ? 'selected' : '' }}>Auto</option>
                    <option value="Property" {{ old('policy_type', $policy->policy_type) == 'Property' ? 'selected' : '' }}>Property</option>
                    <option value="Travel" {{ old('policy_type', $policy->policy_type) == 'Travel' ? 'selected' : '' }}>Travel</option>
                </select>
                @error('policy_type')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium">Status</label>
                <select name="status"
                    id="status"
                    class="mt-1 block w-full h-8 border-gray-300 shadow-sm focus:border-slate-500
                      focus:ring-slate-500 sm:text-sm dark:text-black"
                    required>
                    <option value="">Select Status</option>
                    <option value="Active" {{ old('status', $policy->status) == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Pending" {{ old('status', $policy->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Expired" {{ old('status', $policy->status) == 'Expired' ? 'selected' : '' }}>Expired</option>
                </select>
                @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="premium_amount" class="block text-sm font-medium">Premium Amount</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="number"
                        name="premium_amount"
                        id="premium_amount"
                        class="mt-1 block w-full h-8 border-gray-300 shadow-sm focus:border-slate-500
                      focus:ring-slate-500 sm:text-sm dark:text-black"
                        step="0.01"
                        min="0"
                        value="{{ old('premium_amount', $policy->premium_amount) }}"
                        required>
                </div>
                @error('premium_amount')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm
            font-medium rounded-md text-white bg-slate-600 hover:bg-blue-700 focus:outline-none
            focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update Policy
                </button>
            </div>
        </form>
    </div>
</div>
@endsection