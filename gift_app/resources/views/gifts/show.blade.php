<h1>{{ $gift->name }}</h1>

@if($gift->url)
    <p><a href="{{ $gift->url }}">Lien</a></p>
@endif

@if($gift->details)
    <p>{{ $gift->details }}</p>
@endif

<p>{{ $gift->price }} €</p>