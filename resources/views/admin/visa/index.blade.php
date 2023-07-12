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
                            <a type="button" class="btn btn-primary addNew Button" href="{{route('visa.create')}}">Add New Visa</a>
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Visa Country</th>
                                            <th scope="col">Visa Type</th>
                                            <th scope="col">Entry Type</th>
                                            <th scope="col">Processing Time</th>
                                            <th scope="col">Continent</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($visas)>0)
                                        @php $i=1; @endphp
                                            @foreach($visas as $visa)
                                                <tr>
                                                    <th scope="row">{{$i}}</th>
                                                    <td>{{$visa->visa_name}}</td>
                                                    <td>{{ucfirst($visa->visa_type)}}</td>
                                                    <td>{{$visa->entry_type}}</td>
                                                    <td>{{$visa->processing_time}}</td>
                                                    <td>{{str_replace("_", ' ', $visa->continent)}}</td>
                                                    <td>{{$visa->status}}</td>
                                                    <td>
                                                        <a type="button" class="btn btn-primary" href="{{route('visa.edit',$visa->id)}}">Edit</a>
                                                        <a type="button" href="{{route('visa.delete',$visa->id)}}" class="btn btn-danger"
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
