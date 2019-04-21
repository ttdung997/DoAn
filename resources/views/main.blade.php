<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts._head')
    </head>
    <body>
        <div class="">
            @include('layouts._nav-main')
            <div class="mt-5">
                @yield('content')
            </div>
        </div>
        @include('layouts._script')
        <!-- add scripts -->
        @yield('scripts')
    </body>
</html>
