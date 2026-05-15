<x-layout>

  <div class="container-fluid">
    <div class="row">
      <h2>
        Aggiungi un nuovo servizio
      </h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Create Post Form -->
        <form method="POST" action="{{route('services-store')}}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Titotlo:</label>
            <input type="text" name="name" class="form-control" id="title" aria-describedby="emailHelp" value="{{ old('name') }}"> 

          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>
            <textarea name="description" id="description" class="form-control"> {{ old('description') }}</textarea>

          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input type="text" name="price" class="form-control" id="price" aria-describedby="emailHelp" value="{{ old('price') }}">
          </div>

          <div class="mb-3">
            <label for="img" class="form-label">Immagine:</label>
            <input type="file" name="img" class="form-control" id="img" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
          
              @foreach ($tags as $tag)
                <input type="checkbox" id="{{'tagsCheck' . $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                <label for="{{'tagsCheck' . $tag->id }}">{{ $tag->name }}</label>
              @endforeach
              <p>Vuoi creare un nuovo tag? <a href="{{ route('tags.create') }}">Clicca qui</a></p>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Inserisci il tuo servizio</button>
        </form>
      </div>
    </div>
  </div>

</x-layout>