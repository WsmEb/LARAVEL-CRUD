@extends('layouts.layout')

@section('content')
    <form action="{{ route('contact.update', $contact->id) }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('put')

        @if ($errors->any())
            <div class="mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ $contact->first_name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('first_name')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ $contact->last_name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('last_name')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" id="email" name="email" value="{{ $contact->email }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="job_title" class="block text-gray-700 text-sm font-bold mb-2">Job Title:</label>
            <input type="text" id="job_title" name="job_title" value="{{ $contact->job_title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('job_title')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City:</label>
            <input type="text" id="city" name="city" value="{{ $contact->city }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('city')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country:</label>
            <input type="text" id="country" name="country" value="{{ $contact->country }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('country')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Contact</button>
    </form>
@endsection
