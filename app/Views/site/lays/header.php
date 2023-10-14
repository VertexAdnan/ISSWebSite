<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $settings['sitename'] ?></title>

    <meta name="description" content="<?= $settings['description'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Icon -->
    <link rel="icon" type="image/png" href="public/assets/images/icon.png">
    <!-- Google Fonts -->

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>public/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FontAwesome -->
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>public/assets/bower_components/font-awesome/css/font-awesome.min.css" />

    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>public/assets/bower_components/owl.carousel/dist/assets/owl.carousel.min.css" />
    <!-- Youplay -->

    <link rel="stylesheet" type="text/css" href="<?= $uri ?>public/assets/youplay/css/youplay.min.css" />

    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>public/assets/css/custom.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>

    <!-- Preloader -->
    <div class="page-preloader preloader-wrapp">
        <img src="<?= $uri ?>public/assets/images/logo.png" alt="">
        <div class="preloader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Navbar -->
    <nav class="navbar-youplay navbar navbar-default navbar-fixed-top ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="off-canvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= $uri ?>anasayfa">
                    <img src="<?= $uri ?>public/assets/images/<?= $settings['logo'] ?>" alt="">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php foreach ($mainMenu as $menu) { ?>
                        <li class="dropdown dropdown-hover ">
                            <a href="<?= $menu['route'] ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?= $menu['title'] ?> <?= $menu['childs'] ? '<span class="caret"></span>' : '' ?> <span class="label"><?= $menu['title_en'] ?></span>
                            </a>
                            <?php if ($menu['childs']) { ?>
                                <div class="dropdown-menu">
                                    <ul role="menu">
                                        <?php foreach ($menu['childs'] as $child) { ?>
                                            <li><a href="<?= $child['route'] ?>"><?= $child['title'] ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown dropdown-hover">
                        <a href="<?= $logged_in ? 'kullanici' : 'giris' ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <?= ($logged_in ? $customer_name . ' <span class="label">' . ($is_premium ? 'Premium Hesap' : 'Normal Hesap') . '</span> ' . '<span class="caret"></span>' : 'Giriş Yap <span class="label">login</span>') ?>
                        </a>
                        <?php if ($logged_in) { ?>
                            <div class="dropdown-menu">
                                <ul role="menu">
                                    <li><a href="<?= $uri ?>kullanici">Hesabım</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="<?= $uri ?>cikis">Çıkış Yap</a>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->