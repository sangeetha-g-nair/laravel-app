@extends('layouts.app')



@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Users Management</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>

        </div>

    </div>

</div>



@if ($message = Session::get('success'))

<div class="alert alert-success">

  <p>{{ $message }}</p>

</div>

@endif



<table class="table table-bordered">

 <tr>
   <th>Name</th>

   <th>Email</th>

   <th>Roles</th>

   <th width="280px">Action</th>

 </tr>

 @foreach ($data as $user)

  <tr>

    <td>{{ $user->name }}</td>

    <td>{{ $user->email }}</td>

    <td>

        @if(!empty($user->getRoleNames()))

        @foreach($user->getRoleNames() as $v)

        <b></h5>{{ $v }}</h5></b>

        @endforeach

        @endif
    </td>
  </tr>

 @endforeach

</table>


@endsection