<h1>Créer un cadeau</h1>

<form method="POST" action="{{ route('gifts.store') }}">
    @csrf

    <input name="name" placeholder="Nom">
    <input name="url" placeholder="URL">
    <textarea name="details"></textarea>
    <input name="price" placeholder="Prix">

    <button>Créer</button>
</form>