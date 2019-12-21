<!--right sidebar start-->
<div class="right-sidebar">

    <ul class="right-side-accordion">
        <li class="widget-collapsible">
            <a href="#" class="head widget-head red-bg active clearfix">
                <span class="pull-left">work progress (5)</span>
                <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
            </a>
            <ul class="widget-container">
                <li>
                    <div class="prog-row side-mini-stat clearfix">

                        <div class="side-mini-graph">
                            <div class="target-sell">
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </li>

    </ul>
</div>
<!--right sidebar end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="<?php echo base_url( 'js/lib/jquery.js' ); ?>"></script>
<script src="<?php echo base_url( 'bs3/js/bootstrap.min.js' ); ?>"></script>
<script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/accordion-menu/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo base_url( 'js/scrollTo/jquery.scrollTo.min.js' ); ?>"></script>
<script src="<?php echo base_url( 'assets/jQuery-slimScroll-1.3.0/jquery.slimscroll.js' ); ?>"></script>

<script type="text/javascript" src="<?php echo base_url( 'js/jquery-validate/jquery.validate.min.js' ); ?>"></script>

<!--common script init for all pages-->
<script src="<?php echo base_url( 'js/scripts.js?v=' . config_item( 'app_version' ) ); ?>"></script>

<!--this form validation script-->
<script src="<?php echo base_url( 'js/jquery-validate/validation-init.js' ); ?>"></script>

<!--date time plugin script-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url( 'assets/bootstrap-datepicker/css/datepicker.css' ); ?>"/>
<script type="text/javascript" src="<?php echo base_url( 'assets/bootstrap-datepicker/js/bootstrap-datepicker.js' ); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url( 'assets/bootstrap-datetimepicker/css/datetimepicker.css' ); ?>"/>
<script type="text/javascript" src="<?php echo base_url( 'assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo base_url( 'assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo base_url( 'assets/bootstrap-timepicker/js/bootstrap-timepicker.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo base_url( 'assets/bootstrap-daterangepicker/moment.min.js' ); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url( 'assets/bootstrap-daterangepicker/daterangepicker-bs3.css' ); ?>"/>
<script type="text/javascript" src="<?php echo base_url( 'assets/bootstrap-daterangepicker/daterangepicker.js' ); ?>"></script>

<!--file upload plugin script-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url( 'assets/bootstrap-fileupload/bootstrap-fileupload.css' ); ?>"/>
<script type="text/javascript" src="<?php echo base_url( 'assets/bootstrap-fileupload/bootstrap-fileupload.js' ); ?>"></script>

<!--multi select function -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url( 'assets/jquery-multi-select/css/multi-select.css' ); ?>"/>
<script type="text/javascript" src="<?php echo base_url( 'assets/jquery-multi-select/js/jquery.multi-select.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo base_url( 'assets/jquery-multi-select/js/jquery.quicksearch.js' ); ?>"></script>

<script src="<?php echo base_url( 'js/advanced-form/advanced-form.js' ); ?>"></script>

<!-- include summernote css/js-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 300,
        });
    })
</script>

<!--icheck init -->
<link href="<?php echo base_url( 'assets/iCheck-master/skins/flat/green.css' ); ?>" rel="stylesheet">
<script src="<?php echo base_url( 'js/icheck/icheck-init.js' ); ?>"></script>
<script src="<?php echo base_url( 'assets/iCheck-master/jquery.icheck.js' ); ?>"></script>

<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo base_url( 'assets/skycons/skycons.js' ); ?>"></script>

<!--Easy Pie Chart-->
<script src="<?php echo base_url( 'assets/easypiechart/jquery.easypiechart.js' ); ?>"></script>
<!--Sparkline Chart-->
<script src="<?php echo base_url( 'assets/sparkline/jquery.sparkline.js' ); ?>"></script>
<!--jQuery Flot Chart-->
<!--<script src="--><?php //echo base_url( 'assets/flot-chart/jquery.flot.js' ); ?><!--"></script>-->
<!--<script src="--><?php //echo base_url( 'assets/flot-chart/jquery.flot.tooltip.min.js' ); ?><!--"></script>-->
<!--<script src="--><?php //echo base_url( 'assets/flot-chart/jquery.flot.resize.js' ); ?><!--"></script>-->
<!--<script src="--><?php //echo base_url( 'assets/flot-chart/jquery.flot.pie.resize.js' ); ?><!--"></script>-->

<script src="<?php echo base_url( 'assets/jquery.scrollTo/jquery.scrollTo.js' ); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url( 'assets/calendar/clndr.js' ); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="<?php echo base_url( 'assets/calendar/moment-2.2.1.js' ); ?>"></script>
<script src="<?php echo base_url( 'js/calendar/evnt.calendar.init.js' ); ?>"></script>
<!--<script src="--><?php //echo base_url( 'assets/jvector-map/jquery-jvectormap-1.2.2.min.js' ); ?><!--"></script>-->
<!--<script src="--><?php //echo base_url( 'assets/jvector-map/jquery-jvectormap-us-lcc-en.js' ); ?><!--"></script>-->
<!--<script src="--><?php //echo base_url( 'assets/gauge/gauge.js' ); ?><!--"></script>-->
<!--clock init-->
<script src="<?php echo base_url( 'assets/css3clock/js/script.js?v=' . config_item( 'app_version' ) ); ?>"></script>

<script src="<?php echo base_url( 'js/dashboard.js?v=' . config_item( 'app_version' ) ); ?>"></script>

<!-- Select2 -->
<link href="<?= base_url( 'assets/select2/select2.min.css' ) ?>" rel="stylesheet"/>
<!--<script src="--><? //= base_url( 'assets/select2/select2.full.min.js' ) ?><!--"></script>-->
<script src="<?= base_url( 'assets/select2/select2.min.js' ) ?>"></script>

<!--custom js function -->
<script src="<?php echo base_url( 'js/custom.js?v=' . config_item( 'app_version' ) ) ?>"></script>
<script src="<?php echo base_url( 'js/jnn_custom.js?v=' . config_item( 'app_version' ) ) ?>"></script>

<script>
    $('.select2').select2();
</script>

</body>
</html>
