<!doctype html>
<html lang="en">
@include('admin.layouts.head')

    

@include('admin.layouts.header')
    
@yield('content')

@include('admin.layouts.footer')

@include('admin.layouts.js')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> 

@yield('js')

</body>

</html>
