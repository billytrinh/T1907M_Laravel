<!doctype html>
<html lang="en">
<head>
    <x-head/>
</head>
<body>
    <x-header/>
    <div class="container">
        @yield("content")
    </div>
    @include("components.footer")
</body>
</html>
