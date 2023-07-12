@extends('layouts.main')
@section('content')

<!-- Destination Start -->
@php
    $bg_image = url('/').'/images/success.webp';
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
    color: #000000;
}
button.btn.btn-primary.w-100.py-3.visa-apply-btn {
    margin: 13% 0% 0% 170%;
    border-radius: 2rem;
}
</style>
    <div class="container-fluid bg-primary hero-header-visa">
        <div class="container">
            <div class="row justify-content-center py-5-h">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    @if(isset($visa))
                        <h1 class="display-3 text-black mb-3 animated slideInDown"><span class="bg-heading">Your Request Hase ben Submited For {{$visa['visa_name']}} Visa</span></h1>
                    @else
                        <h1 class="display-3 text-black mb-3 animated slideInDown"><span class="bg-heading">Your Request Hase ben Submited.</span></h1>
                    @endif
                    <p class="fs-4 text-white mb-4 animated slideInDown"></p>
                </div>
            </div>
        </div>
    </div>
@endsection