@extends('layouts.layout')
@section('content')
    <button style="background-color: #4CAF50; color: white; border: none; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;"> <a href="{{route('contact.store')}}">add new contact</a> </button>

    <table class="min-w-full bg-white">
        @if (session('status'))
            <div class="bg-red-500 text-white text-sm rounded px-4 py-3 mb-6" role="alert">
                {{ session('status') }}
            </div>
        @endif  @if (session('success'))
            <div class="bg-green-500 text-white text-sm rounded px-4 py-3 mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <thead class="bg-gray-800 text-white">
        <tr>
            <th class="text-left py-3 px-4">id</th>
            <th class="text-left py-3 px-4">first_name</th>
            <th class="text-left py-3 px-4">last_name</th>
            <th class="text-left py-3 px-4">email</th>
            <th class="text-left py-3 px-4">job title</th>
            <th class="text-left py-3 px-4">city</th>
            <th class="text-left py-3 px-4">country</th>
            <th class="text-left py-3 px-4">action</th>
        </tr>
        </thead>
        <tbody class="text-gray-700">
        @foreach($data as $contact)
            <tr class="text-sm">
                <td class="py-3 px-4">{{ $contact->id }}</td>
                <td class="py-3 px-4">{{ $contact->first_name }}</td>
                <td class="py-3 px-4">{{ $contact->last_name }}</td>
                <td class="py-3 px-4">{{ $contact->email }}</td>
                <td class="py-3 px-4">{{ $contact->job_title }}</td>
                <td class="py-3 px-4">{{ $contact->city }}</td>
                <td class="py-3 px-4">{{ $contact->country }}</td>
                <td class="py-3 px-4">
                    <a href="{{ route('contact.edit', $contact->id) }}" class="bg-red-500 text-white rounded px-2 py-1 hover:bg-red-600">Update</a>
                    <form action="{{ route('contact.delete', $contact->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white rounded px-2 py-1 hover:bg-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
