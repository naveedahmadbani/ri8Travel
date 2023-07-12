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
                    <form action="{{ route('user.update',$user->id) }}" method="post" class="repeater" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="row margin-wrap">
                            <div class="col-sm-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{$user->name}}" name="name" placeholder="Enter Name">
                            </div>
                            <div class="col-sm-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{$user->email}}" name="email" placeholder="exapmle@ri8travel.com">
                            </div>
                            <div class="col-sm-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" value="{{$user->password}}" name="password" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="row margin-wrap">
                            <div class="col-sm-3">
                                <label for="name" class="form-label">Image</label>
                                <img src="{{asset($user->image)}}" style="width: 25px;">
                                <input type="file" class="form-control bg-dark" value="" name="image">
                            </div>
                            <div class="col-sm-3">
                                <label for="user_type" class="form-label">Role</label>
                                <select class="form-select" name="role">
                                    <option @if($user->status == 'agent' ) selected @endif value="agent">Agent</option>
                                    <option @if($user->status == 'admin' ) selected @endif value="admin">Admin</option>
                                    <option @if($user->status == 'user' ) selected @endif value="user">User</option>
                                </select>  
                            </div>
                            <div class="col-sm-3">
                                <label for="user_type" class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option @if($user->status == 'active' ) selected @endif value="active">Active</option>
                                    <option @if($user->status == 'disable' ) selected @endif value="disable">Disable</option>
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
