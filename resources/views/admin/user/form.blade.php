@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ isset($user)?$user->name : '' }}">
    @if ($errors->first('name'))
    <span class="text-danger">
        {{ $errors->first('name') }}
    </span>
    @endif

</div>

<div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" name="email" id="email" class="form-control" value="{{ isset($user)? $user->email : '' }}">
    @if ($errors->first('email'))
    <span class="text-danger">
        {{ $errors->first('email') }}
    </span>
    @endif

</div>

@if (empty($user))
<label for="password"><b>Password</b></label>

<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
<label for="Retype_Password"><b>Retype Password</b></label>

<input type="password" class="form-control" id="Retype_Password" name="password_confirmation"
    placeholder="Retype Password" />
@if ($errors->first('password'))
<span class="text-danger">
    {{ $errors->first('password') }}
</span>
@endif
@endif

<div class="text-center">

    <button type="submit" class="btn btn-success">Save</button>
</div>
