@extends('layouts.main')
@section('content')









	@foreach($users as $user)
<div class="card my-3 container">
	<div class="row">
		<div class="col-1">
			<p>{{$user->id}}</p>	
		</div>
		<div class="col-4">
			<p>{{$user->name}}</p>	
		</div>
		<div class="col-4">
			<p>{{$user->email}}</p>	
		</div>
		<div class="col-2">
			<form method="PUT" action="{{url('control')}}/{{$user->id}}" >
				
				<select onchange="this.form.submit();" name="user_role">
					 <option <?php if($user->user_role == 1){echo "selected";} ?> value="1">owner</option>
					 <option <?php if($user->user_role == 2){echo "selected";} ?> value="2">admin</option>
					 <option <?php if($user->user_role == 3){echo "selected";} ?> value="3">user</option>
				</select>

			</form>
		</div>
	</div>
</div>
@endforeach
	






@endsection