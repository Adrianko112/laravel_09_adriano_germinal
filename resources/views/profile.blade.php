<x-layout>
<div class="container-fluid header d-flex align-items-center justify-content-center">
    <div class="row align-items-center h-100 justify-content-around align-items-center">
        <div class="col-12 col-md-6 text-white ">
            <h2 class="text-white text-center text-color display-4 fw-bold h-25">Il tuo profilo</h2>
            <p class="text-white text-center text-color display-6 h-25">Benvenuto {{ Auth::user()->name }}! Qua ci sono i tuoi servizi caricati</p>
            <p class="text-white text-center text-color display-6 h-25">Email: {{ Auth::user()->email }}</p>
        </div>
        <div class="col-12 col-md-6 text-white ">
            @forelse (Auth::user()->services as $servizio)
                <div class="mb-3">
                <x-services :servizio="$servizio"/>
                </div>
            @empty
                <p class="text-white text-center">Non hai caricato nessun servizio.</p>
                <h3>
                    <a href="{{ route('services-create') }}" class="btn btn-primary w-100">Crea il tuo primo servizio</a>
                </h3>
            @endforelse
        </div>
    </div>
</div>


           







</x-layout>