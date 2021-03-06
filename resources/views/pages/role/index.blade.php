@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Management User</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">Role</a>
        </li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"> Add Role </h2>
                <form action="{{ route('role.store') }}" method="post">
                    <div class="form-group">
                        @csrf
                        <label for="">Role Name</label>
                        <input type="text" name="role_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn  btn-primary float-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"> Table Role </h2>
                <table id="example1" class="table table-striped table-bordered" style="text-align: center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no =1;
                        @endphp
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $role->role_name }}</td>
                            <td>
                                <form action="{{ route('role.destroy', $role->id) }}" method="post"
                                    class="sa-remove" id="data-{{ $role->id }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                  </form>
                                    <a href="{{route('role.edit', $role->id)}}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i><span>Edit</span></a>
                                    
                                    <button onclick="deleteRow({{ $role->id }})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Delete</button>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function deleteRow(id){
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if(willDelete){
          $('#data-' + id).submit();
        }
      })
    }
  </script>