{{csrf_field()}}
<div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="nameHelp" placeholder="First Name" value="{{old('first_name',$user->first_name)}}">
    <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="nameHelp" placeholder="First Name" value="{{old('last_name',$user->last_name)}}">
    <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="nameHelp" placeholder="First Name" value="{{old('email',$user->email)}}">
    <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

@if(!$user->id)
<div class="form-group">
    <label for="password">Password</label>
    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

    @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="password-confirm">Password Confirm</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
</div>

@endif