@extends('admin.layouts.admin')
@section('content')
<div class="card">
	<h5 class="card-header">User profile</h5>
	<div class="card-body">
		@if($user)
		<form method="post" action="{{ route('admin.user.update',$user->id) }}">
			{{csrf_field()}}
			<div class="form-group">
				<label for="inputTitle" class="col-form-label">Name</label>
				<input id="inputTitle" type="text" name="name" value="{{$user->name}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="inputEmail">Email</label>
				<input id="inputEmail" type="text" name="email" value="{{$user->email}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="city" class="col-form-label">City</label>
				<input id="city" type="text" name="city" value="{{$user->city}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="state" class="col-form-label">State</label>
				<input id="state" type="text" name="state" value="{{$user->state}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="type" class="col-form-label">type</label>
				<input id="type" type="text" name="type" value="{{$user->type}}" class="form-control" disabled>
			</div>
			<div class="form-group">
				<label for="address" class="col-form-label">Address</label>
				<input id="address" type="text" name="address" value="{{$user->address}}" class="form-control">
			</div>
	        <div class="form-group">
				<label for="role" class="col-form-label">Role</label>
	          <select class="form-control" name="is_admin">
	            <option value="" disabled>Role</option>
	            <option value="1" @if($user->is_admin == '1') selected @endif>Admin</option>
	            <option value="0" @if($user->is_admin == '0') selected @endif>User</option>
	          </select>
	        </div>
			<div class="form-group mb-3">
				<button type="reset" class="btn btn-warning">Reset</button> <button class="btn btn-primary" type="submit">Update</button>
			</div>
		</form>
		@else
		<h2>No user found!</h2>
		@endif
	</div>
</div>
@endsection