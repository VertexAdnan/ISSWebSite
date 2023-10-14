<?= $header ?>
<?= $header ?>
<div class="youplay-banner banner-top youplay-banner-parallax small" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
    <div class="image" style="background-image: url(<?= $uri ?>public/assets/images/game-diablo-iii-1400x656.jpg); transform: translate3d(0px, 0px, 0px);">
    </div>

    <div class="youplay-user-navigation">
        <div class="container">
            <ul>
                <li><a href="<?= $uri ?>kullanici">Profilim</a>
                </li>
                <li><a href="<?= $uri ?>kullanici/ayarlar">Hesap Ayarlarım</a>
                </li>
                <li class="active"><a href="<?= $uri ?>kullanici/kupon">Kuponlar</a>
                </li>
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
        <h3>Kupon Kullan</h3>
        <div class="form-horizontal mt-30 mb-40">
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_email">Kupon Kodun:</label>
                <div class="col-sm-10">
                    <div class="youplay-input">
                        <input type="text" id="coupon" placeholder="xxxx-xxxx-xxxx-xxxx">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" onclick="useCoupon()" class="btn btn-default">Kullan</button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h3>Kullandığım Kuponlar:</h3>
            <?php if (count($usedCoupons) <= 0 || !$usedCoupons) { ?>
                <h4>Daha önce kupon kullanmadın!</h4>
            <?php } else { ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kupon</th>
                            <th>Dolar</th>
                            <th>GC</th>
                            <th>VIP Gün</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usedCoupons as $coupon) { ?>
                            <tr>
                                <th scope="row"><?= $coupon['coupon_id'] ?></th>
                                <td><?= $coupon['coupon'] ?></td>
                                <td><?= $coupon['dollar'] ?></td>
                                <td><?= $coupon['gc'] ?></td>
                                <td><?= $coupon['vipdays'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    let wait = false;
    const useCoupon = () => {
        if (wait) return toastr.error('Biraz beklemen gerek!')

        wait = true;

        var coupon = $("#coupon").val();

        $.ajax(`<?= $uri ?>profile/useCoupon`, {
            type: 'POST',
            dataType: 'JSON',
            data: {
                coupon: coupon
            }
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                $("#coupon").val('');
                toastr.success(data.response)
                $(".form-group").remove()
                setTimeout( () => {
                    window.location.reload();
                }, 2000)
            }
        })

        setTimeout(() => {
            wait = false;
        }, 4000)
    }
</script>
<?= $footer ?>