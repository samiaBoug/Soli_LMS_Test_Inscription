<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soli-lms</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Include Quill stylesheet : rich text editor. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
    
    @include('admin.includes.aside')
    <div class="ml-60 p-4">
    @include('admin.includes.header')
    @yield('content')
    @yield('script')
    @include('admin.includes.footer')
   </div>
</body>
</html>