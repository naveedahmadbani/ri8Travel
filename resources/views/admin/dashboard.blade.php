@extends('admin.layouts.main')
@section('content')
<div class="content">
    <!-- Navbar Start -->
    @include('admin.layouts.admin_nav')

    <!-- Navbar End -->

    
    <!-- Sale & Revenue Start -->
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
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">All Leads</p>
                        <h6 class="mb-0">{{$data['all_leads']}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">All Declined</p>
                        <h6 class="mb-0">{{$data['all_r_leads']}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">All Sucess</p>
                        <h6 class="mb-0">{{$data['all_s_leads']}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">All Pending</p>
                        <h6 class="mb-0">{{$data['all_p_leads']}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Leads</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">Date</th>
                            <th scope="col">Visa</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leads as $lead)
                        <tr>
                            <td><input class="form-check-input" name="lead[]" value="{{$lead['id']}}" type="checkbox"></td>
                            <td>{{date('D, d M Y',strtotime($lead['created_at']))}} - {{date('h:i a',strtotime($lead['created_at']))}}</td>
                            <td>{{strtoupper($lead['visa'])}}</td>
                            <td>{{$lead['name']}}</td>
                            <td>{{$lead['email']}}</td>
                            <td>{{$lead['phone']}}</td>
                            <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">To Do List</h6>
                        <a href="">Show All</a>
                    </div>
                    <form action="{{ route('assign.lead') }}" method="post">
                        @csrf
                        <input type="hidden" name="lead_list" id="lead_list" value="">
                        <div class="d-flex mb-2">
                            <select class="form-select" name="user">
                                <option value="">Select A user</option>
                                @foreach($users as $user)
                                    <option value="{{$user['id']}}">{{$user['name']}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary ms-2">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() 
    {
        var selected_leads = [];

        $('input[name="lead[]"]').on('change', function() {
            if($(this).is(':checked')) {
                selected_leads.push($(this).val());
            }
            else {
                selected_leads.splice($.inArray($(this).val(), selected_leads),1);
            }
            $('#lead_list').val(JSON.stringify(selected_leads));
        });
    });
   
</script>
@endsection