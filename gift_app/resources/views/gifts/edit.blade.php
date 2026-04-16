<h1>Modifier</h1>

<form method="POST" action="{{ route('gifts.update', $gift) }}">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $gift->name }}">
    <input name="url" value="{{ $gift->url }}">
    <textarea name="details">{{ $gift->details }}</textarea>
    <input name="price" value="{{ $gift->price }}">

    <button>Modifier</button>
</form>