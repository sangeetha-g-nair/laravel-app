@extends('layouts.app')



@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Role Management</h2>

        </div>
       @can('role-create')
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
        </div>
       @endcan
    </div>

</div>



@if ($message = Session::get('success'))

<div class="alert alert-success">

  <p>{{ $message }}</p>

</div>

@endif



<table class="table table-bordered">

 <tr>
   <th>Role</th>

   <th width="280px">Action</th>

 </tr>

 @foreach ($data as $roles)

  <tr>

    <td>{{ $roles->name }}</td>

    <td>

    </td>

  </tr>

 @endforeach

</table>


@endsection