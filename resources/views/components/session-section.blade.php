@if(isset($message) && $errors)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong style="color: black;">{{ $message }}</strong>
    <button type="button" class="btn-close auth_form_message" data-bs-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if(isset($message) && !$errors)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong style="color: black;">{{ $message }}</strong>
    <button type="button" class="btn-close auth_form_message" data-bs-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(session('successMessage'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong style="color: black;">{{ session('successMessage') }}</strong>
    <button type="button" class="btn-close auth_form_message" data-bs-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(isset($errors) && is_array($errors) && count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors as $error)
        <li style="color:black;font-weight:600;">{{ $error[0] }}</li>
        @endforeach
    </ul>
</div>
@endif