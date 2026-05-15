<x-layout>
<div class="container-fluid">
    <div class="row servizi">
        <div class="col-12 col-md-6">
            <h2 class="text-white text-center text-color display-4 fw-bold">{{ $servizio->name }}</h2>
            <p class="text-white text-center text-color fs-4">{{ $servizio->description }}</p>
                <p class="text-white text-center text-color fs-5">Prezzo: {{ $servizio->price }}€</p>
                <ul>
                    @forelse ($servizio->tags as $tag)
                        <li class="text-white text-center text-color fs-5">{{ $tag->name }}</li>
                    @empty
                        <li class="text-white text-center text-color fs-5">Nessun tag assegnato</li>
                    @endforelse
                </ul>
        </div>
          <div class="col-12 col-md-6">
            <img src="{{ Storage::url($servizio->img) }}" alt="{{ $servizio->name }}" class="img-fluid">
        </div>
    </div>
</div>


</x-layout>