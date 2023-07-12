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
                    <form action="{{ route('visa.store') }}" method="post" class="repeater" enctype="multipart/form-data">
                        @csrf
                        <div class="row margin-wrap">
                            <div class="col-sm-2">
                                <label for="visa_name" class="form-label">Visa Country</label>
                                <input type="text" class="form-control"  name="visa_name" >
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
                            <!-- <div class="col-sm-2">
                                <label for="continent" class="form-label">Continent</label>
                                <select class="form-select" name="continent">
                                    <option value="Asia">Asia</option>
                                    <option value="Europe">Europe</option>
                                    <option value="Africa">Africa</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Australia">Australia</option>
                                    <option value="South_America">South America</option>
                                    <option value="North_America">North America</option>
                                </select> 
                            </div> -->
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
                            <div class="col-sm-3">
                                <label for="visa_type" class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="active">Active</option>
                                    <option value="disable">Disable</option>
                                </select>  
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" 
                                    aria-label="With textarea"></textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="important_note" class="form-label">Important Note</label>
                                <textarea class="form-control summernote" name="important_note" 
                                    aria-label="With textarea"></textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="document_required" class="form-label">Document Required</label>
                                <textarea class="form-control summernote" name="document_required" 
                                    aria-label="With textarea"></textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="employed_r_d" class="form-label">Employed Required Document</label>
                                <textarea class="form-control summernote" name="employed_r_d" 
                                    aria-label="With textarea"></textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="self_employed_r_d" class="form-label">Self Employed Required Document</label>
                                <textarea class="form-control summernote" name="self_employed_r_d" 
                                    aria-label="With textarea"></textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="studen_r_d" class="form-label">Studen Required Document</label>
                                <textarea class="form-control summernote" name="studen_r_d" 
                                    aria-label="With textarea"></textarea>
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-12">
                                <label for="retired_r_d" class="form-label">Retired Required Document</label>
                                <textarea class="form-control summernote" name="retired_r_d" 
                                    aria-label="With textarea"></textarea>
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
    // function add(line_no) {

    //     $.ajax({
    //             url: "/faq/html",
    //             type: "get",
    //             data: {
    //                 line_no: line_no,
    //                 _token: '{{csrf_token()}}'
    //             },
    //             dataType: 'json',
    //             success: function (response) {
    //                 console.log(response);
    //                 $('#new').html(response);
    //             }
    //         });
    // } 
</script>
<!-- <script>
        $('#faq').repeater({
            show: function () {
                $(this).slideDown();

            },

            hide: function (deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },

            ready: function (setIndexes) {
            },
            isFirstItemUndeletable: true
        });
       
    </script> -->
@endsection
