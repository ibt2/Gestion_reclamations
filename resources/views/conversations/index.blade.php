@extends('layouts.app')
@section('title', '')
  
@section('contents')
<div class="container">
    @include('conversations.users',['users'=>$users])
    
    
</div>
@endsection
