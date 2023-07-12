@extends('admin.layouts.main')
@section('content')
<div class="content">
    @include('admin.layouts.admin_nav')
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
                            <td>{{date('D, d M Y',strtotime($lead['created_at']))}} - {{date('h:i a',strtotime($lead['created_at']))}}</td>
                            <td>{{strtoupper($lead['visa'])}}</td>
                            <td>{{$lead['name']}}</td>
                            <td>{{$lead['email']}}</td>
                            <td>{{$lead['phone']}}</td>
                            <td>
                                <select class="form-select mySelect" data-data="{{$lead['id']}}">
                                    <option @if($lead['status'] == 'pending') selected @endif value="pending">Pending</option>
                                    <option @if($lead['status'] == 'rejected') selected @endif value="rejected">Rejected</option>
                                    <option @if($lead['status'] == 'success') selected @endif value="success">Success</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
        $('.mySelect').on('change', function() {
            var status = $(this).val();
            var lead_id = $(this).data('data');
            var confirmMessage = "Are you sure you want to select " + status + "?";

            if (confirm(confirmMessage)) 
            {
                $.ajax({
                    url: "lead-status-update",
                    type: "post",
                    data: {
                        status: status,
                        lead_id: lead_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (response) {
                        // alert(window.location.origin);

                        window.location.href = "{{ url('/home') }}";
                    }
                });

            }else 
            {
                $(this).val($(this).data('previous-value'));
            }

            $('.mySelect').on('focus', function() {
                $(this).data('previous-value', $(this).val());
            });

        });
    });
</script>
@endsection