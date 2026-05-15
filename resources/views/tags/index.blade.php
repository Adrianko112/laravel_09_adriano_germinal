<x-layout>
    <div class="container-fluid header py-5 text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-5">
                    <h1>Tutte le categorie</h1>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach ($tags as $tag)
                    <div class="col-12 col-md-4 col-lg-3">
                        <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="text-decoration-none text-white">
                            <div
                                class="box d-flex align-items-center justify-content-center p-4 border rounded shadow-sm h-100">
                                <h2 class="m-0 text-center">{{ $tag->name }}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



</x-layout>