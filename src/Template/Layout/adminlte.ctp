<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <!-- <?= $this->Html->meta('icon') ?> -->

    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('/vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>

    <?= $this->Html->css('/vendor/almasaeed2010/adminlte/bower_components/font-awesome/css/font-awesome.min.css') ?>

    <?= $this->Html->css('/vendor/almasaeed2010/adminlte/bower_components/Ionicons/css/ionicons.min.css') ?>

    <?= $this->Html->css('/vendor/almasaeed2010/adminlte/dist/css/AdminLTE.css') ?>

    <?= $this->Html->css('/vendor/almasaeed2010/adminlte/dist/css/skins/_all-skins.css') ?>

    <?= $this->Html->css('/vendor/almasaeed2010/adminlte/bower_components/morris.js/morris.css') ?>

    <?= $this->Html->css('/vendor/almasaeed2010/adminlte/bower_components/jvectormap/jquery-jvectormap.css') ?>

    <?= $this->Html->css('/vendor/almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>

    <?= $this->Html->css('/vendor/almasaeed2010/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>

    <?= $this->Html->css('/vendor/almasaeed2010/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>

    <!-- <?= $this->Html->css('base.css') ?> -->
    <!-- <?= $this->Html->css('style.css') ?> -->

    <?= $this->fetch('css') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <?= $this->fetch('script') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?= $this->cell('Topbar') ?>

        <?= $this->cell('Sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        
            <?= $this->Flash->render() ?>
            <!-- <div class="container clearfix"> -->
                <?= $this->fetch('content') ?>
            <!-- </div> -->

        </div>
        <!-- ./wrapper -->
        
    </div>

    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js') ?>

    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/jquery-ui/jquery-ui.min.js') ?>

    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>

    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/raphael/raphael.min.js') ?>

    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/morris.js/morris.min.js') ?>
    
    <!-- Sparkline -->
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>

    <!-- jvectormap -->
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>

    <!-- jQuery Knob Chart -->
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>

    <!-- daterangepicker -->
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/moment/min/moment.min.js') ?>
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>

    <!-- datepicker -->
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>

    <!-- Bootstrap WYSIHTML5 -->
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>

    <!-- Slimscroll -->
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>

    <!-- FastClick -->
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/bower_components/fastclick/lib/fastclick.js') ?>

    <!-- AdminLTE App -->
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/dist/js/adminlte.js') ?>
    <!-- <script src="dist/js/adminlte.min.js"></script> -->

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <!-- <script src="dist/js/pages/dashboard.js"></script> -->

    <!-- AdminLTE for demo purposes -->
    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/dist/js/demo.js') ?>
    <!-- <script src="dist/js/demo.js"></script> -->

    <?= $this->fetch('scriptBottom') ?>
</body>
</html>
