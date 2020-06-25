@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ isset($client)?$client->name : '' }}">
    @if ($errors->first('name'))
    <span class="text-danger">
        {{ $errors->first('name') }}
    </span>
    @endif

</div>

<div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" name="email" id="email" class="form-control" value="{{ isset($client)? $client->email : '' }}">
    @if ($errors->first('email'))
    <span class="text-danger">
        {{ $errors->first('email') }}
    </span>
    @endif

</div>
<div class="form-group">
    <label for="phone_number">Phone Number</label>
    <input type="text" name="phone_number" id="phone_number" class="form-control"
        value="{{ isset($client)?$client->phone_number : '' }}">
    @if ($errors->first('phone_number'))
    <span class="text-danger">
        {{ $errors->first('phone_number') }}
    </span>
    @endif

</div>

<div class="text-center">
    <button type="submit" class="btn btn-success">Save</button>
</div>
