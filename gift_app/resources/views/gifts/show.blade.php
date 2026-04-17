@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">

    <h1 class="text-2xl font-bold mb-4">{{ $gift->name }}</h1>

    <div class="space-y-3">

        <div>
            <p class="text-gray-500">Prix</p>
            <p class="font-semibold">{{ $gift->price }} €</p>
        </div>

        @if($gift->url)
            <div>
                <p class="text-gray-500">Lien</p>
                <a href="{{ $gift->url }}" target="_blank"
                   class="text-blue-600 underline">
                    {{ $gift->url }}
                </a>
            </div>
        @endif

        @if($gift->details)
            <div>
                <p class="text-gray-500">Détails</p>
                <p>{{ $gift->details }}</p>
            </div>
        @endif

    </div>

    <div class="mt-6 flex gap-2">

        <a href="{{ route('gifts.edit', $gift->id) }}"
           class="bg-yellow-500 text-white px-4 py-2 rounded">
            Modifier
        </a>

        <a href="{{ route('index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded">
            Retour
        </a>

    </div>

</div>

@endsection