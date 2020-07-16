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

<div class="form-check">
    <input class="form-check-input" type="radio" name="is_admin" id="exampleRadios1" value="1"
        {{isset($user) && $user->is_admin == 1?'checked':''}}>
    <label class="form-check-label" for="exampleRadios1">
        admin
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="is_admin" id="exampleRadios2" value="0"
        {{isset($user) && $user->is_admin == 0?'checked':''}}>
    <label class="form-check-label" for="exampleRadios2">
        vendor
    </label>
</div>
@if ($errors->first('is_admin'))
<span class="text-danger">
    {{ $errors->first('is_admin') }}
</span>
@endif
<div class="text-center">

    <button type="submit" class="btn btn-success">Save</button>
</div>
