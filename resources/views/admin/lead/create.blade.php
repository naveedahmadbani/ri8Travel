@extends('admin.layouts.main')
@section('content')

<div class="content">
    @include('admin.layouts.admin_nav')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Basic Form</h6>
                    <form action="{{ route('lead.store') }}" method="post" class="repeater" enctype="multipart/form-data">
                        @csrf
                        <div class="row margin-wrap">
                            <div class="col-sm-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control"  name="name" >
                            </div>
                            <div class="col-sm-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control"  name="email" >
                            </div>
                            <div class="col-sm-2">
                                <label for="Phone" class="form-label">Phone</label>
                                <input type="text" class="form-control"  name="phone" >
                            </div>
                            <div class="col-sm-3">
                                <label for="slug" class="form-label">Visa</label>
                                <select class="form-select" name="slug">
                                    <option value="">Select Visa</option>
                                    @foreach($visas as $visa)
                                        <option value="{{$visa['slug']}}">{{$visa['visa_name']}}</option>
                                    @endforeach
                                </select>  
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-6 mt-4">
                                <button type="submit" class="btn btn-default btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
 
@section('js')
@endsection
