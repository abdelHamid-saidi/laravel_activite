@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Liste des cadeaux</h1>

        <a href="{{ route('gifts.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Ajouter
        </a>
    </div>

    @if($gifts->count() == 0)
        <p class="text-gray-500">Aucun cadeau pour le moment.</p>
    @endif

    <div class="space-y-4">

        @foreach($gifts as $gift)
            <div class="border p-4 rounded flex justify-between items-center">

                <div>
                    <h2 class="font-semibold text-lg">{{ $gift->name }}</h2>
                    <p class="text-gray-600">{{ $gift->price }} €</p>
                </div>

                <div class="flex gap-2">

                    <a href="{{ route('gifts.show', $gift->id) }}"
                       class="bg-gray-600 text-white px-3 py-1 rounded">
                        Voir
                    </a>

                    <a href="{{ route('gifts.edit', $gift->id) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Modifier
                    </a>

                    <form action="{{ route('gifts.destroy', $gift->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-600 text-white px-3 py-1 rounded">
                            Supprimer
                        </button>
                    </form>

                </div>

            </div>
        @endforeach

    </div>

</div>

@endsection