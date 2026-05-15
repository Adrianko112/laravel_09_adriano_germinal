

<div class="card h-100" style="width: 18rem;">
    @if (!$servizio->img)
        <img src="https://picsum.photos/200/300" class="card-img-top cardImg" alt="immagine del servizio">

    @else
        <img src="{{Storage::url($servizio->img) }}" class="card-img-top cardImg" alt="immagine del servizio">
    @endif
    <div class="card-body d-flex flex-column bg-dark text-white">
        <h5 class="card-title">{{ $servizio->name }}</h5>
        <p class="card-text">{{ $servizio->description }}</p>
        <p class="card-text">Operatore del corso: {{ $servizio->user->name }}</p>
        <p class="card-text">Prezzo: ${{ number_format($servizio->price, 2) }}</p>
        @forelse ($servizio->tags as $tag)
            <a class="badge bg-secondary m-1" href="{{ route('tags.index', compact('tag')) }}">{{ $tag->name }}</a>
        @empty
            <p class="card-text">Nessun tag assegnato</p>
        @endforelse
        <a href="{{ route('servizio.show', parameters: compact('servizio')) }}" class="btn btn-primary mt-auto">Vai al servizio</a>
        @auth
            @if ($servizio->user_id == Auth::id())
        <a href="{{ route('servizio.edit', parameters: compact('servizio')) }}"
            class="btn btn-secondary mt-auto">Modifica il servizio</a>
        <button type="button" class="btn btn-danger mt-auto" data-bs-toggle="modal"
            data-bs-target="#deleteModal{{ $servizio->id }}">
            Elimina il servizio
        </button>
        @endif
        @endauth
       
    </div>
</div>

<!-- Modal di conferma eliminazione -->


<div class="modal fade" id="deleteModal{{ $servizio->id }}" tabindex="-1"
    aria-labelledby="deleteModalLabel{{ $servizio->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark"> <!-- text-dark per contrasto se lo sfondo è scuro -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $servizio->id }}">Conferma eliminazione</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler eliminare il servizio <strong>{{ $servizio->name }}</strong>? Questa azione non è
                reversibile.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                <form action="{{ route('servizio.delete', compact('servizio')) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                </form>
            </div>
        </div>
    </div>
</div>