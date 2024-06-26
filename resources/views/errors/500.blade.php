  @extends('main.auth-app')
  @section('content')
  <main class="main-content  mt-0">
    <div>
      <section class="min-vh-100 d-flex align-items-center">
        <div class="container">
          <div class="row mt-lg-0 mt-8">
            <div class="col-lg-5 my-auto">
              <h1 class="display-1 text-bolder text-gradient text-warning fadeIn1 fadeInBottom mt-5">Error 500</h1>
              <h2 class="fadeIn3 fadeInBottom opacity-8">Something went wrong</h2>
              <p class="lead opacity-6 fadeIn2 fadeInBottom">{{ $exception->getMessage() }}</p>
              <button type="button" class="btn bg-gradient-warning mt-4 fadeIn2 fadeInBottom">Go to Homepage</button>
            </div>
            <div class="col-lg-7 my-auto">
              <img class="w-100 fadeIn1 fadeInBottom" src="{{ asset('assets/img/illustrations/error-500.png') }}" alt="500-error">
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>



  @endsection