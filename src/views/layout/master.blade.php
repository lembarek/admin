<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin::layout.partials.head')
 </head>

 <body>

        @include('admin::layout.partials.nav')


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                     @include('admin::layout.partials.sidebar')
                </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    @yield('content')
            </div>
        </div>

        @include('admin::layout.partials.footer')

        @yield('scripts')

 </body>
</html>
