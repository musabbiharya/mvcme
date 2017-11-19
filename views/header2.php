<?php
/*
 * mvc ;
 * header2.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 4, 2017;
 * 4:51:33 PM;
 * Jakarta International Container Terminal (JICT);
 */
?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $this->title ?></title>
        <link href="<?php echo BACKEND_TEMPLATE; ?>assets/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo BACKEND_TEMPLATE; ?>assets/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo BACKEND_TEMPLATE; ?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <link href="<?php echo BACKEND_TEMPLATE; ?>assets/css/custom.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <script src="<?php echo BACKEND_TEMPLATE; ?>assets/js/jquery-1.10.2.js"></script>

    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= URL ?>"><?php echo $this->companyLogo ?></a> 
                </div>
                <div style="color: white;
                     padding: 15px 50px 5px 50px;
                     float: right;
                     font-size: 16px;"><div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><img height="20px"  src="<?php echo BACKEND_TEMPLATE; ?>assets/img/find_user.png" class="img-circle" />
                                                                                              <?php echo $this->nameuser ?> <span class="caret"></span></button>
											  <ul class="dropdown-menu dropdown-menu-right">
												<li><a href="<?=URL?>userprofile/userprofile/edit">Profile</a></li>
                                                                                                <li><a href="<?=URL?>userprofile/userprofile/changePass" >Change Password</a></li>
												<li class="divider"></li>
                                                                                                <li><a href="javascript:void(0)" onclick="if(confirm('Sure go Out?')){ window.location.href='<?= URL ?>dashboard/dashboard/logout'}">Logout</a></li>
											  </ul>
											</div> </div>
            </nav>   
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <li>

                    </li>
                    <ul class="nav" id="main-menu">
                        <?php
                        foreach ($this->Navbar as $menu) {
                            if (isset($menu['child'])) {
                                ?>
                                <li>
                                    <a id="<?= $menu['page'] ?>" href="#" title="<?= $menu['descript'] ?>"><i class="fa <?= $menu['pclass'] ?> fa-2x"></i><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <?php foreach ($menu['child'] as $menu2) {
                                            ?>
                                            <li>
                                                <a id="<?= $menu2['page'] ?>" href="<?= URL . $menu2['page'] ?>" title="<?= $menu2['descript'] ?>"><i class="fa <?= $menu2['pclass'] ?> fa-1x"></i></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } else {
                                ?>
                                <li>
                                    <a id="<?= $menu['page'] ?>" href="<?= URL . $menu['page'] ?>" title="<?= $menu['descript'] ?>"><i class="fa <?= $menu['pclass'] ?> fa-2x"></i></a>
                                </li>
                            <?php
                            }
                        }
                        ?>

                    </ul>

                </div>

            </nav>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?= $this->title ?></h2>
                            <h5><?= isset($this->msg) ? $this->msg : ''; ?></h5>
                            <div id="splash" class="alert " hidden>
                                <span class="glyphicon" > </span>
                            </div>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <!-- /. NAV SIDE  -->
