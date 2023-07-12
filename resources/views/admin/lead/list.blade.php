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
                            <a type="button" class="btn btn-primary addNew Button" href="{{route('lead.create')}}">Add New Lead</a>
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col">Date</th>
                                        <th scope="col">Visa</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Assigned To</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Treated Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leads as $lead)
                                    <tr>
                                        <td>{{date('D, d M Y',strtotime($lead['created_at']))}} - {{date('h:i a',strtotime($lead['created_at']))}}</td>
                                        <td>{{strtoupper($lead['visa'])}}</td>
                                        <td>{{$lead['name']}}</td>
                                        <td>{{$lead['email']}}</td>
                                        <td>{{$lead['phone']}}</td>
                                        <td>{{$lead['assigned_to_name']}}</td>
                                        <td>{{ucfirst($lead['status'])}} </td>
                                        <td>{{date('D, d M Y',strtotime($lead['updated_at']))}} - {{date('h:i a',strtotime($lead['updated_at']))}} </td>
                                    </tr>
                                    @endforeach
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
