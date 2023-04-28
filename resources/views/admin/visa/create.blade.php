@extends('admin.layouts.main')
@section('content')

<div class="content">
    <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input class="form-control bg-dark border-0" type="search" placeholder="Search">
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="{{asset('assets/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="{{asset('assets/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="{{asset('assets/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all message</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notificatin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Profile updated</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">New user added</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Password changed</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all notifications</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="{{asset ('assets/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">John Doe</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
    <!-- Navbar End -->
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Basic Form</h6>
                    <form>
                        <div class="row margin-wrap">
                            <div class="col-sm-2">
                                <label for="visa_name" class="form-label">Visa Country</label>
                                <input type="text" class="form-control"  name="visa_name">
                            </div>
                            <div class="col-sm-3">
                                <label for="visa_type" class="form-label">Visa Type</label>
                                <select class="form-select" name="visa_type">
                                    <option value="visit">Visit Visa</option>
                                    <option value="express">Express Visa</option>
                                    <option value="etc">ETC Visa</option>
                                </select>  
                            </div>
                            <div class="col-sm-3">
                                <label for="entry_type" class="form-label">Entry Type</label>
                                <select class="form-select" name="entry_type">
                                    <option value="single">Single</option>
                                    <option value="Double">Double</option>
                                    <option value="etc">ETC</option>
                                </select>  
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-2">
                                <label for="continent" class="form-label">Continent</label>
                                <input type="text" class="form-control"  name="continent" placeholder="Asia">
                            </div>
                            <div class="col-sm-2">
                                <label for="processing_time" class="form-label">Processing Time</label>
                                <input type="text" class="form-control"  name="processing_time" placeholder=" 4 weeks">
                            </div>
                            <div class="col-sm-2">
                                <label for="banner_image" class="form-label">Banner Image</label>
                                <input type="file" class="form-control bg-dark"  name="banner_image">
                            </div>
                            <div class="col-sm-2">
                                <label for="tile_img" class="form-label">Tile Image</label>
                                <input type="file" class="form-control bg-dark"  name="tile_img">
                            </div>
                                                       
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-2">
                                <label for="adult_selling_price" class="form-label">Adult Selling Price</label>
                                <input type="number" class="form-control"  name="adult_selling_price" placeholder="4500">
                            </div>
                            <div class="col-sm-2">
                                <label for="child_selling_price" class="form-label">Child Selling Price</label>
                                <input type="number" class="form-control"  name="child_selling_price" placeholder="4500">
                            </div>
                            <div class="col-sm-2">
                                <label for="infant_sell_price" class="form-label">Infant Selling Price</label>
                                <input type="number" class="form-control"  name="infant_sell_price" placeholder="4500">
                            </div>                  
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="summernote" name="description" aria-label="With textarea"></textarea>
                            </div>
                        </div>

                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <H3 for="days">Faqs</H3>
                                    <br>
                                    <div id="faq">
                                        <div data-repeater-list="faq">
                                            <div class="" data-repeater-item>
                                                <div class="form-group">
                                                    <label>{{ __('Question') }}</label>
                                                    <input type="text" name="question"
                                                            class="form-control @error('question') is-invalid @enderror"
                                                            value="{{old('question')}}"
                                                            placeholder="Enter Question"
                                                            required>
                                                    @error('question')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group" style="display: inline">
                                                    <label>{{ __('Answer') }}</label>
                                                    <textarea type="text" name="answer" id="answer"
                                                                class="form-control answer @error('answer') is-invalid @enderror"
                                                                value="{{old('answer')}}"
                                                                placeholder="Enter Answer"></textarea>
                                                    @error('answer')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror


                                                    <div class=""
                                                            style="position: absolute;left: 76px;bottom: 25px;"
                                                            data-repeater-delete>
                                                        <button type="button" class="btn btn-danger">Delete
                                                        </button>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <button class="btn btn-primary mb-2 mt-2" data-repeater-create
                                                type="button">Add
                                        </button>


                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <button type="submit" class="btn btn-default btn-primary">Submit</button>
                            </div>
                        </div>

                        <div class="row margin-wrap">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>

                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@push('scripts')
@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
   $(document).ready(function() {
        $('#summernote').summernote({
            height: 300
        });
   });
</script>

@endsection
