<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="{{ asset('assets/theme/js/bootstrap.min.js') }}"></script>

<!-- chart js -->
<script src="{{ asset('assets/theme/js/chartjs/chart.min.js') }}"></script>
<!-- bootstrap progress js -->
<script src="{{ asset('assets/theme/js/progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('assets/theme/js/nicescroll/jquery.nicescroll.min.js') }}"></script>
<!-- icheck -->
<script src="{{ asset('assets/theme/js/icheck/icheck.min.js') }}"></script>

<script src="{{ asset('assets/theme/js/custom.js') }}"></script>

<!-- moris js -->
<script src="{{ asset('assets/theme/js/moris/raphael-min.js') }}"></script>
<script src="{{ asset('assets/theme/js/moris/morris.js') }}"></script>
<script src="{{ asset('assets/theme/js/moris/example.js') }}"></script>
    

@yield('scripts')