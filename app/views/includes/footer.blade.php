<div id="copyright text-right"></div>
<!-- Javascripts
================================================== -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  
</script>
  
@yield('scripts')