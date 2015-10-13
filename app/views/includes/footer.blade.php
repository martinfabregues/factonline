<div id="copyright text-right"></div>
<!-- Javascripts
================================================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.min.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  
</script>
  
@yield('scripts')