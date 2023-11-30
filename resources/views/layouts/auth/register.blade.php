  @extends('main.auth-app')
  @section('content')
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body pb-3">
                  @if(isset($message))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong  style="color:white;text">{{ $message }}</strong>
  <button type="button" class="btn-close auth_form_message" data-bs-dismiss="alert" aria-label="Close"></button>
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
                  <form role="form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <label>Name</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name">
                    </div>
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password">
                    </div>
                    <label for="password_confirmation">Confirm Password:</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" aria-label="Confirm Password" required>
                    </div>  
                    <label>User type</label>
                    <div class="mb-3">
                      <select class="form-control" id="exampleFormControlSelect1">
                          <option value="0">User</option>
                          <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-check form-check-info text-left">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="../../../pages/privacy.html" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Sign up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-sm-4 px-1">
                  <p class="mb-4 mx-auto">
                    Already have an account?
                    <a href="../../../pages/sign-in/sign-in-cover.html" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                <img src="{{ asset('assets/img/shapes/pattern-lines.svg') }}" alt="pattern-lines" class="position-absolute opacity-4 start-0">
                <div class="position-relative">
                  <img class="max-width-500 w-100 position-relative z-index-2" src="{{ asset('assets/img/illustrations/rocket-white.png') }}" alt="rocket">
                </div>
                <h4 class="mt-5 text-white font-weight-bolder">Your journey starts here</h4>
                <p class="text-white">Just as it takes a company to sustain a product, it takes a community to sustain a protocol.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  @endsection