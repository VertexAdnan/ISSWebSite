<?= $header ?>
<section class="content-wrap full youplay-login">

    <!-- Banner -->
    <div class="youplay-banner banner-top">
        <div class="image" style="background-image: url('public/assets/images/banner-bg.jpg')"></div>

        <div class="info">
            <div>
                <div class="container align-center">
                    <div class="youplay-form">
                        <h1>Giriş Yap</h1>
                        <div class="youplay-input">
                            <input type="text" id="email" name="login" placeholder="Email">
                        </div>
                        <div class="youplay-input">
                            <input type="password" id="password" name="password" placeholder="Şifre">
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 4px;">
                            <button type="button" onclick="handleLogin()" class="btn btn-default db">Giriş Yap</button>
                            <a href="kaydol" class="btn btn-default db">Kaydol</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->

</section>
<!-- /Main Content -->

<script type="text/javascript">
    let wait = false;

    const handleLogin = () => {
        if (wait) {
            return toastr.error('Biraz beklemen gerekiyor!')
        }
        wait = true;
        var email = $("#email").val();
        var password = $("#password").val();

        $.ajax(`<?= $uri ?>login/handleLogin`, {
            type: "POST",
            dataType: "JSON",
            data: {
                email: email,
                password: password
            }
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                toastr.success(data.response)
                $(".youplay-form").hide("slow")
                setTimeout( () => {
                    window.location = '/'
                }, 1500)
            }

            setTimeout(() => {
                wait = false;
            }, 3000)
        })
    }
</script>
<?= $footer ?>