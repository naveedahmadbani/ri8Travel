@extends('admin.layouts.main')
@section('content')

<div class="content">
    @include('admin.layouts.admin_nav')
    <!-- Form Start -->
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
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Basic Form</h6>
                    <form action="{{ route('user.store') }}" method="post" class="repeater" enctype="multipart/form-data">
                        @csrf
                        <div class="row margin-wrap">
                            <div class="col-sm-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" required value="" name="name" placeholder="Enter Name">
                            </div>
                            <div class="col-sm-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" required value="" name="email" placeholder="exapmle@ri8travel.com">
                            </div>
                            <div class="col-sm-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" required value="" name="password" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-3">
                                <label for="name" class="form-label">Image</label>
                                <input type="file" class="form-control bg-dark" required value="" name="image">
                            </div>
                            <div class="col-sm-3">
                                <label for="user_type" class="form-label">Role</label>
                                <select class="form-select" name="role">
                                    <option value="agent">Agent</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>  
                            </div>
                            <div class="col-sm-3">
                                <label for="user_type" class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="active">Active</option>
                                    <option value="disable">Disable</option>
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
    <script src="{{asset('assets/admin/plugins/wysiwyag/jquery.richtext.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/wysiwyag/wysiwyag.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/summernote-editor/summernote1.js')}}"></script>
    <script src="{{asset('assets/admin/js/summernote.js')}}"></script>

    <script src="{{asset('assets/admin/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/fancyuploder/fancy-uploader.js')}}"></script>

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
            $("#city_id").on("change", function() {
                var id = $(this).val();
                $.ajax({
                    url: "/get-universities/"+ id,
                    type: "GET",
                    success: function(data) {
                        $('#university').html(data);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert("Error: " + xhr.status + " " + thrownError);
                    }
                });
            });
        });
    </script>


@endsection
