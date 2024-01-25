<!-- Navbar -->
<nav class="navbar sticky-top navbar-light" style="height: 60px; background-color: #34418e;">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="margin-left: 1%;">
        <li class="nav-item" >
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <img src="NUFV Watermark.png" alt="Logo" style="height: 35px; margin-top: -1px;">

            </a>
        </li>
    </ul>

    <!-- Right Side -->
    <ul class="navbar-nav ml-auto" style="margin-right: 0%; margin-top: -5px;" >
        <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="brand-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <span class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center bg-primary text-white font-weight-500" style="width: 38px;height:50px"><?php echo strtoupper(substr($_SESSION['login_firstname'], 0,1).substr($_SESSION['login_lastname'], 0,1)) ?></span>
                <span class="brand-text font-weight-light"><?php echo ucwords($_SESSION['login_firstname'].' '.$_SESSION['login_lastname']) ?></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pushMenuDropdown" style="position: absolute; right: 100px;">
                <a class="dropdown-item manage_account" href="javascript:void(0)" data-id="<?php echo $_SESSION['login_id'] ?>">My Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="ajax.php?action=logout">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

