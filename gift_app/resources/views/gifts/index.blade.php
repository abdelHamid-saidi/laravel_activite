<h1>Liste des cadeaux</h1>

<a href="{{ route('gifts.create') }}">Ajouter</a>

@foreach($gifts as $gift)
    <p>
        {{ $gift->name }} - {{ $gift->price }} €

        <a href="{{ route('gifts.show', $gift) }}">Voir</a>
        <a href="{{ route('gifts.edit', $gift) }}">Modifier</a>

        <form action="{{ route('gifts.destroy', $gift) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Supprimer</button>
        </form>
    </p>
@endforeach