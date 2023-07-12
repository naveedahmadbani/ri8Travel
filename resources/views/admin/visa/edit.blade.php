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
                    <form action="{{ route('visa.update',$visa->id) }}" method="post" class="repeater" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$visa->id}}">
                        <div class="row margin-wrap">
                            <div class="col-sm-2">
                                <label for="visa_name" class="form-label">Visa Country</label>
                                <input type="text" class="form-control"  value="{{$visa->visa_name}}" name="visa_name">
                            </div>
                            <div class="col-sm-3">
                                <label for="visa_type" class="form-label">Visa Type</label>
                                <select class="form-select" name="visa_type">
                                    <option @if($visa->visa_type == 'visit' ) selected @endif value="visit">Visit Visa</option>
                                    <option @if($visa->visa_type == 'express' ) selected @endif value="express">Express Visa</option>
                                    <option @if($visa->visa_type == 'etc' ) selected @endif value="etc">ETC Visa</option>
                                </select>  
                            </div>
                            <div class="col-sm-3">
                                <label for="entry_type" class="form-label">Entry Type</label>
                                <select class="form-select" name="entry_type">
                                    <option @if($visa->entry_type == 'single' ) selected @endif value="single">Single</option>
                                    <option @if($visa->entry_type == 'double' ) selected @endif value="double">Double</option>
                                    <option @if($visa->entry_type == 'etc' ) selected @endif value="etc">ETC</option>
                                </select>  
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <!-- <div class="col-sm-2">
                                <label for="continent" class="form-label">Continent</label>
                                <select class="form-select" name="continent">
                                    <option @if($visa->continent == 'Asia' ) selected @endif value="Asia">Asia</option>
                                    <option @if($visa->continent == 'Europe' ) selected @endif value="Europe">Europe</option>
                                    <option @if($visa->continent == 'Africa' ) selected @endif value="Africa">Africa</option>
                                    <option @if($visa->continent == 'Antarctica' ) selected @endif value="Antarctica">Antarctica</option>
                                    <option @if($visa->continent == 'Australia' ) selected @endif value="Australia">Australia</option>
                                    <option @if($visa->continent == 'South_America' ) selected @endif value="South_America">South America</option>
                                    <option @if($visa->continent == 'North_America' ) selected @endif value="North_America">North America</option>
                                </select> 
                            </div> -->
                            <div class="col-sm-2">
                                <label for="processing_time" class="form-label">Processing Time</label>
                                <input type="text" class="form-control"  value="{{$visa->processing_time}}" name="processing_time" placeholder=" 4 weeks">
                            </div>
                            <div class="col-sm-2">
                                <label for="banner_image" class="form-label">Banner Image</label>
                                <input type="file" class="form-control bg-dark" name="banner_image">
                            </div>
                            <div class="col-sm-2">
                                <label for="tile_img" class="form-label">Tile Image</label>
                                <input type="file" class="form-control bg-dark" name="tile_img">
                            </div>
                                                       
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-2">
                                <label for="adult_selling_price" class="form-label">Adult Selling Price</label>
                                <input type="number" class="form-control"  value="{{$visa->adult_selling_price}}" name="adult_selling_price" placeholder="4500">
                            </div>
                            <div class="col-sm-2">
                                <label for="child_selling_price" class="form-label">Child Selling Price</label>
                                <input type="number" class="form-control"  value="{{$visa->child_selling_price}}" name="child_selling_price" placeholder="4500">
                            </div>
                            <div class="col-sm-2">
                                <label for="infant_sell_price" class="form-label">Infant Selling Price</label>
                                <input type="number" class="form-control"  value="{{$visa->infant_sell_price}}" name="infant_sell_price" placeholder="4500">
                            </div>                  
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-3">
                                <label for="visa_type" class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option @if($visa->status == 'active' ) selected @endif value="active">Active</option>
                                    <option @if($visa->status == 'disable' ) selected @endif value="disable">Disable</option>
                                </select>  
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" 
                                    aria-label="With textarea">{!! $visa->description !!}</textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="important_note" class="form-label">Important Note</label>
                                <textarea class="form-control summernote" id="important_note" name="important_note" 
                                    aria-label="With textarea">{!! $visa->important_note !!}</textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="document_required" class="form-label">Document Required</label>
                                <textarea class="form-control summernote" id="document_required" name="document_required" 
                                    aria-label="With textarea">{!! $visa->document_required !!}</textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="employed_r_d" class="form-label">Employed Required Document</label>
                                <textarea class="form-control summernote" name="employed_r_d" 
                                    aria-label="With textarea">{!! $visa->employed_r_d !!}</textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="self_employed_r_d" class="form-label">Self Employed Required Document</label>
                                <textarea class="form-control summernote" name="self_employed_r_d" 
                                    aria-label="With textarea">{!! $visa->self_employed_r_d !!}</textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="studen_r_d" class="form-label">Studen Required Document</label>
                                <textarea class="form-control summernote" name="studen_r_d" 
                                    aria-label="With textarea">{!! $visa->studen_r_d !!}</textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="retired_r_d" class="form-label">Retired Required Document</label>
                                <textarea class="form-control summernote" name="retired_r_d" 
                                    aria-label="With textarea">{!! $visa->retired_r_d !!}</textarea>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote(
        {
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline']],
                ['fontsize', ['fontsize', 'fontsizeunit', 'fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph', 'style']],
                ['Insert', ['picture', 'link', 'video', 'table', 'hr']],
                ['height', ['height']],
                ['Misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help']]
            ],
            fontsize: true,
            placeholder: 'Page content',
            addDefaultFonts: false,
            height: 300,
            fontNames: [
                'Arial', 'Arial Black',
                'Courier New',
                'Merriweather',
                'Comic Sans MS',
                'sans-serif',
                'Helvetica',
                'Trajan',
                'Garamond Pro',
                'Futura',
                'Bodoni',
                'Verdana',
                'Tahoma',
                'Trebuchet MS',
                'Times New Roman',
                'Georgia',
                'Garamond',
                'Courier New',
                'Brush Script MT',


            ],
            lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
            styleTags: [
                'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
            ],
        });
    });
   
</script>
@endsection
