<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
@include('theme.header')
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            
            @include('theme.sidebar')
            
            <div class="right_col" role="main">
                <div class="">
                    
                    @yield('main-content')
                    
                </div>
                
                @include('theme.footer')
                
            </div>
            
            
        </div>
    </div>
    
    @include('theme.scripts')
    
</body>
</html>