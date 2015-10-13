<div id="copyright text-right"></div>
<!-- Javascripts
================================================== -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="//codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="{{asset('assets/selectize/js/selectize.js')}}"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  
</script>
  
@yield('scripts')