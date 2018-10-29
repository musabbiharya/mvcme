<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->title ?></title>
        <link rel="shortcut icon" href="<?php echo PUBLIC_IMAGE ?>btb.ico" type="image/x-icon"/>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo BACKEND_TEMPLATE; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo BACKEND_TEMPLATE; ?>bower_components/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?php echo BACKEND_TEMPLATE; ?>bower_components/Ionicons/css/ionicons.min.css">

        <link rel="stylesheet" href="<?php echo BACKEND_TEMPLATE; ?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo BACKEND_TEMPLATE; ?>dist/css/skins/skin-green.min.css">

        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="<?php echo PUBLIC_CSS; ?>jquery-ui.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo PUBLIC_CSS; ?>bootstrap-datepicker.min.css" type="text/css" />
        <script src="<?php echo PUBLIC_JS; ?>jquery-1.10.2.js"></script>
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>B</b>TB</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>BERJAYA</b>TEKNIK</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?= PUBLIC_IMAGE ?>find_user.png" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php echo $this->nameuser ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="<?= PUBLIC_IMAGE ?>find_user.png" class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo $this->nameuser ?> 
                                        </p>
                                    </li>

                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat" onclick="if (confirm('Sure go Out?')) {
                                                        window.location.href = '<?= URL ?>dashboard/dashboard/logout'
                                                    }">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo PUBLIC_IMAGE ?>btb.png" class="img-circle" alt="User Image">
                        </div>

                    </div>

                    <!-- search form (Optional) -->

                    <!-- /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">HEADER</li>
                        <!-- Optionally, you can add icons to the links -->

                        <?php
                        foreach ($this->Navbar as $menu) {
                            if (isset($menu['child'])) {
                                ?>
                                <li class="treeview">
                                    <a id="<?= $menu['page'] ?>" href="#" title=""><i class="fa <?= $menu['pclass'] ?> "></i><span><?= $menu['descript'] ?></span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <?php foreach ($menu['child'] as $menu2) {
                                            ?>
                                            <li>
                                                <a id="<?= $menu2['page'] ?>" href="<?= URL . $menu2['page'] ?>"><i class="fa fa-circle-o"></i><?= $menu2['descript'] ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } else {
                                ?>
                                <li>
                                    <a id="<?= $menu['page'] ?>" href="<?= URL . $menu['page'] ?>" ><i class="fa <?= $menu['pclass'] ?>"></i><span><?= $menu['descript'] ?></span></a>
                                </li>
                                <?php
                            }
                        }
                        ?>

                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $this->title ?>
                        <small><?= isset($this->msg) ? $this->msg : ''; ?></small>
                    </h1>
                    <div id="splash" class="alert " hidden>
                        <span class="glyphicon" > </span>
                    </div>
                    
                </section>

                <!-- Main content -->
                <section class="content container-fluid">