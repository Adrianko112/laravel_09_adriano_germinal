<x-layout>

    <div class="container-fluid header">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 text-center text-md-start text-light">
                <h1 class="mb-4">Crea un nuovo tag</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('tags.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome del tag</label>
                        <input type="text" class="form-control" id="name" name="name" 
                            value="{{ old('name') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Crea Tag</button>
                </form>
            </div>
        </div>
    </div>





</x-layout>