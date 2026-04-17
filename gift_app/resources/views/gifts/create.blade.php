@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">Créer un cadeau</h1>

    <form method="POST" action="{{ route('gifts.store') }}" class="space-y-4">
        @csrf

        {{-- NAME --}}
        <div>
            <label class="block font-semibold">Nom</label>
            <input type="text" name="name"
                   class="w-full border p-2 rounded"
                   value="{{ old('name') }}">

            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- URL --}}
        <div>
            <label class="block font-semibold">URL</label>
            <input type="text" name="url"
                   class="w-full border p-2 rounded"
                   value="{{ old('url') }}">

            @error('url')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- DETAILS --}}
        <div>
            <label class="block font-semibold">Détails</label>
            <textarea name="details"
                      class="w-full border p-2 rounded">{{ old('details') }}</textarea>

            @error('details')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- PRICE --}}
        <div>
            <label class="block font-semibold">Prix</label>
            <input type="text" name="price"
                   class="w-full border p-2 rounded"
                   value="{{ old('price') }}">

            @error('price')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Créer
        </button>

    </form>
</div>

@endsection