  @extends('main.auth-app')
  @section('content')
    <main class="main-content  mt-0">
        <section class="my-10">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 my-auto">
                <h1 class="display-1 text-bolder text-gradient text-danger">Error 401</h1>
                <h2>{{ $exception->getMessage() }}</h2>
               <button onclick="window.location='{{ route('user.login-form') }}'" class="btn bg-gradient-dark mt-4">Go to Login</button>
            </div>
            <div class="col-lg-6 my-auto position-relative">
                <img class="w-100 position-relative" src="{{ asset('assets/img/illustrations/error-404.png') }}" alt="404-error">
            </div>
            </div>
        </div>
        </section>
    </main>
  @endsection