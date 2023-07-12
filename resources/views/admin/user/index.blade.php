@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid position-relative d-flex p-0">
        <div class="content">
        @include('admin.layouts.admin_nav')

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <a type="button" class="btn btn-primary addNew Button" href="{{route('user.create')}}">Add New User</a>
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Assign Lead</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($users)>0)
                                        @php $i=1; @endphp
                                            @foreach($users as $user)
                                                <tr>
                                                    <th scope="row">{{$i}}</th>
                                                    <td>{{ucfirst($user->name)}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->leads}}</td>
                                                    <td>{{ucfirst($user->role)}}</td>
                                                    <td>{{$user->status??'disable'}}</td>
                                                    <td>
                                                        <a type="button" class="btn btn-primary" href="{{route('user.edit',$user->id)}}">Edit</a>
                                                        <a type="button" href="{{route('user.delete',$user->id)}}" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                                    </td>
                                                </tr>
                                            @php $i++; @endphp

                                            @endforeach
                                        @else
                                            <tr>
                                                Epmty
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection
