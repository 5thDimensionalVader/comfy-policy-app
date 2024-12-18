@extends('layouts.app')

@section('title', 'Create Policy')

@section('page')
<h2 class="text-2xl font-semibold mb-4">Create Policy</h2>
<div class="max-w-2xl mx-auto p-8">
    <div class="shadow-md rounded-lg p-6">
        <form action="{{ route('policies.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="policy_number" class="block text-sm font-medium">Policy Number</label>
                <input type="text"
                    name="policy_number"
                    id="policy_number"
                    class="mt-1 block w-full h-8 border-gray-300 shadow-sm focus:border-slate-500
                      focus:ring-slate-500 sm:text-sm dark:text-black @error('policy_number') border-red-500 @enderror"
                    value="{{ old('policy_number') }}"
                    required>
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
                      focus:ring-slate-500 sm:text-sm dark:text-black @error('customer_name') border-red-500 @enderror"
                    value="{{ old('customer_name') }}"
                    required>
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
                      focus:ring-slate-500 sm:text-sm dark:text-black @error('start_date') border-red-500 @enderror"
                    value="{{ old('start_date') }}"
                    required>
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
                      focus:ring-slate-500 sm:text-sm dark:text-black @error('end_date') border-red-500 @enderror"
                    value="{{ old('end_date') }}"
                    required>
                @error('end_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="policy_type" class="block text-sm font-medium">Policy Type</label>
                <select name="policy_type"
                    id="policy_type"
                    class="mt-1 block w-full h-8 border-gray-300 shadow-sm focus:border-slate-500
                      focus:ring-slate-500 sm:text-sm dark:text-black @error('policy_type') border-red-500 @enderror"
                    required>
                    <option value="">Select Policy Type</option>
                    <option value="Life" {{ old('policy_type') == 'Life' ? 'selected' : '' }}>Life</option>
                    <option value="Health" {{ old('policy_type') == 'Health' ? 'selected' : '' }}>Health</option>
                    <option value="Auto" {{ old('policy_type') == 'Auto' ? 'selected' : '' }}>Auto</option>
                    <option value="Property" {{ old('policy_type') == 'Property' ? 'selected' : '' }}>Property</option>
                    <option value="Travel" {{ old('policy_type') == 'Travel' ? 'selected' : '' }}>Travel</option>
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
                      focus:ring-slate-500 sm:text-sm dark:text-black @error('status') border-red-500 @enderror"
                    required>
                    <option value="">Select Status</option>
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Expired" {{ old('status') == 'Expired' ? 'selected' : '' }}>Expired</option>
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
                        class="pl-7 mt-1 block w-full h-8 border-gray-300 shadow-sm focus:border-slate-500
                      focus:ring-slate-500 sm:text-sm dark:text-black @error('premium_amount') border-red-500 @enderror"
                        step="0.01"
                        min="0"
                        value="{{ old('premium_amount') }}"
                        required>
                </div>
                @error('premium_amount')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('policies') }}"
                    class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm
            font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none
            focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm
            font-medium rounded-md text-white bg-slate-600 hover:bg-blue-700 focus:outline-none
            focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Create Policy
                </button>
            </div>
        </form>

    </div>
</div>

@endsection