@extends('layouts.main')
@section('content')

<!-- Destination Start -->
@php
    $bg_image = url('/').'/images/visa/'.$visa->banner_image;
@endphp
<style>
.container-fluid.bg-primary.hero-header-visa {
    background-image: url({{ $bg_image }}); 
    opacity: 0.7; 
    margin-top: 7%;
    height: 299px;
    padding-top: 56px;
}
span.bg-heading {
    color: black;
}
button.btn.btn-primary.w-100.py-3.visa-apply-btn {
    margin: 13% 0% 0% 170%;
    border-radius: 2rem;
}
.container-xxl.py-5.destination {
    padding-top: 7rem !important;
    padding-bottom: 3rem !important;
}
</style>
    <div class="container-fluid bg-primary hero-header-visa">
        <div class="container">
            <div class="row justify-content-center py-5-h">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-black mb-3 animated slideInDown"><span class="bg-heading">{{$visa->visa_name}} Visa Details</span></h1>
                    <p class="fs-4 text-white mb-4 animated slideInDown"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">{{$visa->visa_name}} Visa </h6>
                <h1 class="mb-5">{{$visa->visa_name}} Visa Description and Requirement</h1>
                        <div class="col-xl-12">
                            <div class="body-border">
                                <div class="t-a-c" class="mb-5">{!! $visa->description !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 outer-full">
                        <div class="top-border">
                            <h3 class="heading">Requirement Documents</h3>
                        </div>
                        <div class="body-border">
                            <div class="t-a-c" >
                                {!! $visa->document_required !!}
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="required-doc-parent">
                <button class="required_doc" id="employed"> Employed </button>
                <button class="required_doc" id="self_employed">Self Employed </button>
                <button class="required_doc" id="student">Student </button>
                <button class="required_doc" id="retired">Retired </button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 outer-full1" style="display:none" id="rqr_doc_employed">
                        <div class="top-border">
                            <h3 class="heading">Employed</h3>
                        </div>
                        <div class="body-border">
                            <div class="t-a-c" >
                                {!! $visa->employed_r_d !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 outer-full1" style="display:none" id="rqr_doc_self_employed">
                        <div class="top-border">
                            <h3 class="heading">Businessman</h3>
                        </div>
                        <div class="body-border">
                            <div class="t-a-c" >
                                {!! $visa->self_employed_r_d !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 outer-full1" style="display:none" id="rqr_doc_student">
                        <div class="top-border">
                            <h3 class="heading">Student</h3>
                        </div>
                        <div class="body-border">
                            <div class="t-a-c">
                                {!! $visa->studen_r_d !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 outer-full1" style="display:none" id="rqr_doc_retired">
                        <div class="top-border">
                            <h3 class="heading">Retired</h3>
                        </div>
                        <div class="body-border">
                            <div class="t-a-c" >
                                {!! $visa->retired_r_d !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="container-body">
                    <form action="{{ route('visa.request') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="hidden" name="slug" value="{{$visa->slug}}">
                                    <input type="text" class="form-control visa" id="name" name="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="email" class="form-control visa" id="email" name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control visa" id="phone" name="phone" placeholder="Your Phone Number">
                                    <label for="email">Your Phone Number</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary w-100 py-3 visa-apply-btn" type="submit">Apply Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
 
@section('js')
<script>
    $(document).ready(function() {
        $(".required_doc").on('click', function(event)
        {
            var id = $(this).attr('id');
            $('.required_doc').css({ "background-color": '#580e48d9'});
            $('#'+id).css({ "background-color": '#580e48'});

            $('.outer-full1').hide();
            $('#rqr_doc_'+id).show();

        });
    });
   
</script>
@endsection