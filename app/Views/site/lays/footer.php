    <!-- Footer -->
    <footer class="youplay-footer-parallax">
      <div class="wrapper" style="background-image: url('<?= $uri ?>public/assets/images/footer-bg.jpg')">

        <!-- Social Buttons -->
        <div class="social">
          <div class="container">
            <h3>Resmi <strong>Discord</strong> Sunucumuza Katıl!</h3>

            <div class="social-icons">
              <div class="social-icon">
                <a href="<?= $settings['discord'] ?>">
                  <i class="fa-brands fa-discord"></i>
                  <span>Discord</span>
                </a>
              </div>

              <div class="social-icon">
                <a href="<?= $settings['youtube'] ?>">
                  <i class="fa-brands fa-youtube"></i>
                  <span>Youtube</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /Social Buttons -->

        <!-- Copyright -->
        <div class="copyright">
          <div class="container">
            <strong>1337VERTEX</strong> &copy; 2023. All rights reserved
          </div>
        </div>
        <!-- /Copyright -->

      </div>
    </footer>
    <!-- /Footer -->

    </section>
    <!-- /Main Content -->



    <!-- jQuery -->
    <script type="text/javascript" src="<?= $uri ?>public/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Hexagon Progress -->
    <script type="text/javascript" src="<?= $uri ?>public/assets/bower_components/HexagonProgress/jquery.hexagonprogress.min.js"></script>


    <!-- Bootstrap -->
    <script type="text/javascript" src="<?= $uri ?>public/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Jarallax -->
    <script type="text/javascript" src="<?= $uri ?>public/assets/bower_components/jarallax/dist/jarallax.min.js"></script>

    <!-- Smooth Scroll -->
    <script type="text/javascript" src="<?= $uri ?>public/assets/bower_components/smoothscroll-for-websites/SmoothScroll.js"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="<?= $uri ?>public/assets/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- Countdown -->
    <script type="text/javascript" src="<?= $uri ?>public/assets/bower_components/jquery.countdown/dist/jquery.countdown.min.js"></script>
    <!-- Youplay -->
    <script type="text/javascript" src="<?= $uri ?>public/assets/youplay/js/youplay.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- init youplay -->
    <script>
      if (typeof youplay !== 'undefined') {
        youplay.init({
          // enable parallax
          parallax: true,

          // set small navbar on load
          navbarSmall: false,

          // enable fade effect between pages
          fadeBetweenPages: true,

          // twitter and instagram php paths
          php: {
            twitter: './php/twitter/tweet.php',
            instagram: './php/instagram/instagram.php'
          }
        });
      }
    </script>


    <script type="text/javascript">
      $(".countdown").each(function() {
        $(this).countdown($(this).attr('data-end'), function(event) {
          $(this).text(
            event.strftime('%D days %H:%M:%S')
          );
        });
      })
    </script>

    </body>

    </html>