<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>HAUNTZ ADMIN</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="<?= $uri ?>public/admin/assets/images/favicon.svg" />

    <!-- *************
			************ CSS Files *************
		************* -->
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="<?= $uri ?>public/admin/assets/fonts/icomoon/style.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= $uri ?>public/admin/assets/css/main.min.css" />

    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="<?= $uri ?>public/admin/assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />

    <!-- Data Tables -->
    <link rel="stylesheet" href="<?= $uri ?>public/admin/assets/vendor/datatables/dataTables.bs5.css" />
    <link rel="stylesheet" href="<?= $uri ?>public/admin/assets/vendor/datatables/dataTables.bs5-custom.css" />
    <link rel="stylesheet" href="<?= $uri ?>public/admin/assets/vendor/datatables/buttons/dataTables.bs5-custom.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- Main container start -->
        <div class="main-container">

            <!-- Sidebar wrapper start -->
            <nav id="sidebar" class="sidebar-wrapper">

                <!-- App brand starts -->
                <div class="app-brand px-3 py-2 d-flex align-items-center">
                    <a href="<?= $uri ?>admin">
                        <img src="<?= $uri ?>public/assets/images/logo.png" class="logo" alt="" />
                    </a>
                </div>
                <!-- App brand ends -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <ul class="sidebar-menu">
                        <?php foreach ($menuItems as $item) { ?>
                            <li class="<?= (($item['currentPage'] == 1) ? 'active current-page' : '') ?>">
                                <a href="<?= $item['route'] ?>">
                                    <i class="icon-stacked_line_chart"></i>
                                    <span class="menu-text"><?= $item['title'] ?></span>
                                </a>
                                <?php if (isset($item['child']) && $item['child']) { ?>
                                    <ul class="treeview-menu" style="display: none;">
                                        <?php foreach ($item['child'] as $child) { ?>
                                            <li>
                                                <a href="<?= $child['route'] ?>"><?= $child['title'] ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- Sidebar menu ends -->

            </nav>
            <!-- Sidebar wrapper end -->