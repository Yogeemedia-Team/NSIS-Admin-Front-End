  @extends('main.auth-app')
  @section('content')
    <main class="main-content  mt-0">
        <section class="my-10">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 my-auto">
                <h1 class="display-1 text-bolder text-gradient text-danger">Error 404</h1>
                <h2>Erm. Page not found</h2>
                <p class="lead">We suggest you to go to the homepage while we solve this issue.</p>
               <button onclick="window.location='{{ route('user.login-form') }}'" class="btn bg-gradient-dark mt-4">Go to Home</button>
            </div>
            <div class="col-lg-6 my-auto position-relative">
                <img class="w-100 position-relative" src="{{ asset('assets/img/illustrations/error-404.png') }}" alt="404-error">
            </div>
            </div>
        </div>
        </section>
    </main>
  @endsection