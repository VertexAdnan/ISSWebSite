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
                <li class="active"><a href="<?= $uri ?>kullanici/ayarlar">Hesap Ayarlarım</a>
                </li>
                <li><a href="<?= $uri ?>kullanici/kupon">Kuponlar</a>
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
        <div class="col-md-9">
            <h3>Şifre Değiştir:</h3>
            <div class="form-horizontal mt-30 mb-40">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="cur_password">Şifren:</label>
                    <div class="col-sm-10">
                        <div class="youplay-input">
                            <input type="password" id="cur_password" placeholder="Şifren">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="new_password">Yeni Şifren:</label>
                    <div class="col-sm-10">
                        <div class="youplay-input">
                            <input type="password" id="new_password" placeholder="Yeni Şifren">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" onclick="changePassword()" class="btn btn-default">Güncelle</button>
                    </div>
                </div>
            </div>

            <h3>Email:</h3>
            <div class="form-horizontal mt-30 mb-40">
                <div class="form-group">
                    <label class="control-label col-sm-2">Email Adresin:</label>
                    <div class="col-sm-10">
                        <?= $email ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="new_email">Yeni Adres:</label>
                    <div class="col-sm-10">
                        <div class="youplay-input">
                            <input type="email" id="new_email" placeholder="@gmail.com">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" onclick="changeEmail()" class="btn btn-default">Güncelle</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let wait = false;
    const changePassword = () => {
        var curPass = $("#cur_password").val();
        var newPass = $("#new_password").val();
        if (wait) {
            return toastr.error('Biraz beklemen gerek!')
        }

        wait = true;

        $.ajax(`<?= $uri ?>profile/changePassword`, {
            type: 'POST',
            dataType: 'JSON',
            data: {
                curPass: curPass,
                newPass: newPass
            }
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                toastr.success(data.response)

                $("#cur_password").val('')
                $("#new_password").val('')
            }
        })

        setTimeout(() => {
            wait = false;
        }, 3000)
    }

    const changeEmail = () => {
        if(wait){
            return toastr.error('Beklemen Gerek!')
        }
        wait = true;

        var newMail = $("#new_email").val()

        $.ajax(`<?= $uri ?>profile/changeMail`, {
            type: 'POST',
            dataType: 'JSON',
            data: {
                newMail: newMail
            }
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                toastr.success(data.response)
                $("#new_email").val('')
            }
        })

        setTimeout( () => {
            wait = false;
        }, 1500)
    }
</script>
<?= $footer ?>