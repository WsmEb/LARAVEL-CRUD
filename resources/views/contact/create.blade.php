@extends('layouts.layout')

@section('content')
    <div class="w-full max-w-xs mx-auto mt-6">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('contacts.store') }}">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                    First Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('first_name') ? ' border-red-500' : '' }}" id="first_name" name="first_name" type="text" >
                @if($errors->has('first_name'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('first_name') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                    Last Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('last_name') ? ' border-red-500' : '' }}" id="last_name" name="last_name" type="text" >
                @if($errors->has('last_name'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('last_name') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('email') ? ' border-red-500' : '' }}" id="email" name="email" type="email" >
                @if($errors->has('email'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="job_title">
                    Job title
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('job_title') ? ' border-red-500' : '' }}" id="job_title" name="job_title" type="text" >
                @if($errors->has('job_title'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('job_title') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                    City
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('city') ? ' border-red-500' : '' }}" id="city" name="city" type="text" >
                @if($errors->has('city'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('city') }}</span>
                @endif
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="country">
                    Country
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('country') ? ' border-red-500' : '' }}" id="country" name="country" type="text" >
                @if($errors->has('country'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('country') }}</span>
                @endif
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Create Contact
                </button>
            </div>
        </form>
    </div>
@endsection
