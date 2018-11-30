<?php
/**
 * Created by PhpStorm.
 * User: MegaMind
 * Date: 6/30/2018
 * Time: 11:05 PM
 */


?>

<header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>PMS </b> </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
                
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="home/<?php echo $user['type'];?>.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $user['username']?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="home/<?php echo $user['type'];?>.jpg" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $user['username']?>
                                 
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="settings.php" class="btn btn-default btn-flat">Settings</a>
                            </div>
                            <div class="pull-right">
                                <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
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
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="home/<?php echo $user['type'];?>.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $user['username']?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo ucwords($user['type']); ?></a>
            </div>
        </div> 

        <ul class="sidebar-menu" data-widget="tree">
            <?php if($user['type'] == 'pharmasist'){ ?>
            <li class="menu-open">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class=" menu-open">
                <a href="medicines.php">
                    <i class="fa fa-question"></i> <span>Medicines</span>
                </a>
            </li>
            
            
            <li class=" menu-open">
                <a href="settings.php">
                    <i class="fa fa-user"></i> <span>Settings</span>
                </a>
            </li>
            <?php } ?>
        <?php if($user['type'] == 'salesman'){ ?>
            <li class="menu-open">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class=" menu-open">
                <a href="sales.php">
                    <i class="fa fa-question"></i> <span>Sales</span>
                </a>
            </li>
            
            <li class=" menu-open">
                <a href="settings.php">
                    <i class="fa fa-user"></i> <span>Settings</span>
                </a>
            </li>


            <?php } ?>


            <?php if($user['type'] == 'admin'){ ?>
            <li class="menu-open">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class=" menu-open">
                <a href="pharmasist.php">
                    <i class="fa fa-question"></i> <span>Pharmasist</span>
                </a>
            </li>
            <li class=" menu-open">
                <a href="salesman.php">
                    <i class="fa fa-question"></i> <span>Salesman</span>
                </a>
            </li>
            <li class=" menu-open">
                <a href="report.php">
                    <i class="fa fa-question"></i> <span>Reports</span>
                </a>
            </li>
            <li class=" menu-open">
                <a href="settings.php">
                    <i class="fa fa-user"></i> <span>Settings</span>
                </a>
            </li>

            
            <?php } ?>
             
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
