<?= $header ?>
<div class="youplay-banner banner-top youplay-banner-parallax small" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
    <div class="image" style="background-image: url(<?= $uri ?>public/assets/images/game-diablo-iii-1400x656.jpg); transform: translate3d(0px, 0px, 0px);">
    </div>

    <div class="youplay-user-navigation">
        <div class="container">
            <ul>
                <li class="active"><a href="<?= $uri ?>kullanici">Profilim</a>
                </li>
                <li><a href="<?= $uri ?>kullanici/ayarlar">Hesap Ayarlarım</a>
                </li>
                <li><a href="<?= $uri ?>kullanici/kupon">Kuponlar</a>
                </li>
                <?php if (isset($isAdmin) && $isAdmin) { ?>
                    <li><a href="<?= $uri ?>admin">Admin Paneli</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
        <div>
            <div class="container youplay-user">
                <div class="user-data">
                    <h2><?= $customer_name ?></h2>
                    <div class="activity">
                        <div>
                            <div class="num"><?= $time_played ?></div>
                            <div class="title">Toplam Süre</div>
                        </div>
                        <div>
                            <div class="num"><?= $ip ?></div>
                            <div class="title">IP</div>
                        </div>
                        <div>
                            <div class="num"><?= $register_date ?></div>
                            <div class="title">Kayıt Tarihi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;">
        <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 1150.2px; height: 1150.2px; overflow: hidden; pointer-events: none; margin-left: 0px; margin-top: -350.1px; visibility: visible;"></div>
    </div>
</div>
<div class="container youplay-content">

    <div class="row">

        <div class="col-md-9">

            <h3 class="mt-0 mb-20"><?= $customer_name ?></h3>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td style="width: 200px;">
                            <p>Email</p>
                        </td>
                        <td>
                            <p><a href="#"><?= $email ?></a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Hesap Durumu</p>
                        </td>
                        <td>
                            <p><a href="#"><?= $account_status == 100 ? 'Normal' : 'Yasaklı' ?></a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Son Giriş Tarihi</p>
                        </td>
                        <td>
                            <p><a href="#"><?= $register_date ?></a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Son Giriş Yapılan IP</p>
                        </td>
                        <td>
                            <p><a href="#"><?= $ip ?></a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Hatalı Giriş Zamanı</p>
                        </td>
                        <td>
                            <p><a href="#"><?= $bad_login_time ?></a>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $footer ?>