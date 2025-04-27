@foreach($users as $user)
<ul>
    <li> <a href="{{route('conversations.show', $user->id)}}" >{{$user->name}}</li></a>
</ul>
@endforeach