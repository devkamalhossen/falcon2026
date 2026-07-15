@extends('admin.layouts.master')
@section('title','Role Management')
@section('styles')
<style>
    .dropdown-menu li a{
        display: flex;
        align-items: center;
        padding: 5px !important;
    }
</style>
@endsection
@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Role Management</h1>
        <div class="d-flex align-items-center justify-content-between flex-wrap">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Roles</li>
            <li class="breadcrumb-item active">Manage Role</li>
          </ol>
        </nav>
        <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm">Add New</a>
    </div>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($roles as $item)
                  <tr>
                    <td>{{$item->name}}</td>
                   
                    <td>
                        @if($item->is_active == 1)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex align-items-center justify-start gap-2">
                          <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('role.show',$item->id)}}"><i class="bx bxs-info-circle"></i> View</a></li>
                              <li><a class="dropdown-item" href="{{route('role.edit',$item->id)}}"><i class="bx bxs-edit-alt"></i> Edit</a></li>
                              <li>
                                <form action="{{route('role.destroy',$item->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button style="display: flex;align-items:center;" onclick="return confirm('Are you sure to delete this item?')" class="dropdown-item text-danger" type="submit" ><i class="bx bxs-trash"></i> Delete</button>
                                </form>
                              </li>
                              <li>
                                <a href="{{route('role.status.update',$item->id)}}" class="text-{{$item->is_active == 1 ? 'danger':'success'}}"><i class="ri-eye-{{$item->is_active == 1 ? 'off-':''}}line"></i>   {{$item->is_active == 1? ' Turn Disable':' Turn Active'}}</a>
                              </li>
                            </ul>
                          </div>
                         
                        </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection