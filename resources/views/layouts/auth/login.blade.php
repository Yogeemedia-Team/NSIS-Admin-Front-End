  @extends('main.auth-app')
  @section('content')
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                  @if(isset($message))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong style="color:white;text">{{ $message }}</strong>
                    <button type="button" class="btn-close auth_form_message" data-bs-dismiss="alert" aria-label="Close">x</button>
                  </div>

                  @endif
                  @if(isset($errors) && is_array($errors) && count($errors) > 0)
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors as $error)
                      <li style="color:white;font-weight:600;">{{ $error[0] }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif



                  <form role="form" action="{{ route('loginApi') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" aria-label="Email">
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" aria-label="Password">
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                <img src="{{ asset('assets/img/shapes/pattern-lines.svg') }}" alt="pattern-lines" class="position-absolute opacity-4 start-0">
                <div class="position-relative">
                  <img class="max-width-500 w-100 position-relative z-index-2" src="{{ asset('assets/img/nsis.png') }}" alt="chat-img">
                </div>
                <h4 class="mt-5 text-black font-weight-bolder">"Negambo South International School"</h4>
                <p class="text-white"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  @endsection