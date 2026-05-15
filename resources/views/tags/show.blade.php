<x-layout>
    <div class="container-fluid header py-5 text-white">
        <div class="container"> 
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-5">
                    <h1>Servizi legati al tag: {{ $tag->name }}</h1>
                </div>
                <div class="row">
                    @forelse ($tag->services as $servizio)
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <x-services :servizio="$servizio" />
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-white text-center">Nessun servizio trovato per questo tag.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>