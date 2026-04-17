@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">Modifier cadeau</h1>

    <form method="POST" action="{{ route('gifts.update', $gift->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="name"
               class="w-full border p-2 rounded"
               value="{{ old('name', $gift->name) }}">

        @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <input type="text" name="url"
               class="w-full border p-2 rounded"
               value="{{ old('url', $gift->url) }}">

        @error('url')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <textarea name="details"
                  class="w-full border p-2 rounded">{{ old('details', $gift->details) }}</textarea>

        @error('details')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <input type="text" name="price"
               class="w-full border p-2 rounded"
               value="{{ old('price', $gift->price) }}">

        @error('price')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Modifier
        </button>
    </form>

</div>

@endsection