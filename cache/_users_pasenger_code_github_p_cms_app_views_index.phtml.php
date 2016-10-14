<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Portal内容管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/node_modules/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/node_modules/ionicons/dist/css/ionicons.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/adminlte/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="/node_modules/dragula/dist/dragula.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/adminlte/plugins/iCheck/all.css">

    <!--  页面编辑CSS   -->
    <link rel="stylesheet" href="/css/p_page.css">

    <!--  页面编辑预览CSS  -->
    <link rel="stylesheet" href="/css/p_preview.css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/node_modules/html5shiv/dist/html5shiv.min.js"></script>
    <script src="/node_modules/respond.js/dest/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery 2.2.3 -->
    <script src="/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
<!--    <script src="/adminlte/plugins/jQueryUI/jquery-ui.min.js"></script>-->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!--    <script>-->
<!--        $.widget.bridge('uibutton', $.ui.button);-->
<!--    </script>-->
    <!-- Bootstrap 3.3.6 -->
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/js/app.min.js"></script>

</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>CMS</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Portal</b>CMS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/adminlte/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Admin
                                    <small>超级管理员</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">我的资料</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/login/logout" class="btn btn-default btn-flat">注销</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li id="m1" class="active treeview">
                    <a href="#">
                        </i><i class="fa fa-apple"></i> <span>移动版</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="m11">
                            <a href="#"><i class="fa fa-safari"></i> V3.2
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li id="m111"><a href="#"><i class="fa fa-file-image-o"></i> 资源配置</a>
                                    <ul class="treeview-menu">
                                        <li id="m1111">
                                            <a href="#"><i class="fa fa-image"></i> 首次认证页资源配置</a>
                                        </li>
                                        <li id="m1112">
                                            <a href="#"><i class="fa fa-image"></i> 二次认证页资源配置</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="m112"><a href="#"><i class="fa fa-html5"></i> 页面配置</a>
                                    <ul class="treeview-menu">
                                        <li id="m1121">
                                            <a href="/pauth1/index"><i class="fa fa-chrome"></i> 首次认证页配置</a>
                                        </li>
                                        <li id="m1122">
                                            <a href="#"><i class="fa fa-chrome"></i> 二次认证页配置</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li id="m12">
                            <a href="#"><i class="fa fa-safari"></i> V2.0
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li id="m121" class="navMenu"><a href="#"><i class="fa fa-chrome"></i> 页面配置</a></li>
                                <li id="m122" class="navMenu"><a href="#"><i class="fa fa-file-image-o"></i> 资源配置</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li id="m2" class="treeview">
                    <a href="#">
                        <i class="fa fa-windows"></i>
                        <span>桌面版</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="m21" class="navMenu">
                            <a href="#"><i class="fa fa-safari"></i> V3.2
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li id="m111" class="navMenu"><a href="#"><i class="fa fa-chrome"></i> 页面配置</a></li>
                                <li id="m112" class="navMenu"><a href="#"><i class="fa fa-file-image-o"></i> 资源配置</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $nav1 ?><?= $version ?>
                <small><?= $nav2 ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> <?= $nav1 ?></li>
                <li class="active"><a href="<?= $nav2Href ?>"><?= $nav2 ?></a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?= $this->getContent() ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.9
        </div>
        <strong>Copyright © 2014 国创科视.</strong> All rights
    </footer>
</div>
<!-- ./wrapper -->

<input type="hidden" value="<?= $menu ?>" id="selectedMenu">

<script>
    // Resolve conflict in jQuery UI tooltip with Bootstrap tooltip
//    $.widget.bridge('uibutton', $.ui.button);

    $(function () {
        var selectedMenu = $("#selectedMenu").val();
        if(selectedMenu != ''){
            var menuLevel1 = selectedMenu.substring(0,2);
            var menuLevel2 = selectedMenu.substring(0,3);

            $("#" + menuLevel1).addClass("active");
            $("#" + menuLevel2).addClass("active");
            $("#" + selectedMenu).addClass("active");
        }
    });
</script>
</body>
</html>
