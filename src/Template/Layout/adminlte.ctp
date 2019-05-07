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

    <?= $this->fetch('css') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

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

    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/dist/js/adminlte.js') ?>

    <?= $this->Html->script('/vendor/almasaeed2010/adminlte/dist/js/demo.js') ?>

    <?= $this->fetch('scriptBottom') ?>
</body>
</html>
