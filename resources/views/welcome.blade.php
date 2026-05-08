<x-layout>
 
   <!-- header -->
    <header>
        <div class="container-fluid header d-flex align-items-center justify-content-center">
             @if (session()->has('errorMessage'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('errorMessage') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('successMessage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('successMessage') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            
            @endif
            <div class="row align-items-center h-100">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center h-100">
                    <h1 class="text-center display-3 mt-5 fw-bold text-color">Benvenuti su GymBro</h1>
                    <p class="text-center display-6 text-color">Il tuo compagno di allenamento numero uno!</p>

                </div>
            </div>
        </div>
    </header>
   
   
</x-layout>
   
   
   
   
  