<h2>Users</h2>

@inject('user', 'App\User')
	
@foreach($user->testInjector() as $user)
	{{ $user->name }}<br>
@endforeach