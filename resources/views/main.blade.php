<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts._head')  
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            @include('layouts._nav')
            <div class="app-main">
                @include('layouts._slider')
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        @yield('content')
                    </div>
                    @include('layouts._footer')
                </div>
            </div>
        </div>
        @include('layouts._script')
        <!-- add scripts -->
        @yield('scripts')
    </body>
</html>
