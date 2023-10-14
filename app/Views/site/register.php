<?= $header ?>
<section class="content-wrap full youplay-login">

    <!-- Banner -->
    <div class="youplay-banner banner-top">
        <div class="image" style="background-image: url('public/assets/images/banner-bg.jpg')"></div>

        <div class="info">
            <div>
                <div class="container align-center">
                    <div class="youplay-form">
                        <h1>Kaydol</h1>
                        <div class="youplay-input">
                            <input type="email" id="email" name="login" placeholder="Email">
                        </div>
                        <div class="youplay-input">
                            <input type="text" id="username" name="username" placeholder="Kullanıcı Adı">
                        </div>
                        <div class="youplay-input">
                            <input type="password" id="password" name="password" placeholder="Şifre">
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 4px;">
                            <button onclick="handleRegister()" class="btn btn-default db">Kaydol</button>
                            <a href="giris" class="btn btn-default db">Giriş Yap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->

</section>
<!-- /Main Content -->
<?= $footer ?>
<script type="text/javascript">
    let wait = false;

    const handleRegister = () => {
        if (wait) {
            return toastr.error('Biraz beklemen gerekiyor!')
        }
        wait = true;
        var email = $("#email").val();
        var password = $("#password").val();
        var username = $("#username").val();

        $.ajax(`<?= $uri ?>register/handleRegister`, {
            type: "POST",
            dataType: "JSON",
            data: {
                email: email,
                username: username,
                password: password
            }
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                toastr.success(data.response)
                $(".youplay-form").hide("slow")
                setTimeout(() => {
                    window.location = '/'
                }, 1500)
            }

            setTimeout(() => {
                wait = false;
            }, 3000)
        })
    }
</script>