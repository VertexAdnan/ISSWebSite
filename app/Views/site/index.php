  <?= $header ?>
  <!-- Main Content -->
  <section class="content-wrap">
      <!-- Banner -->
      <section class="youplay-banner banner-top youplay-banner-parallax">
          <div class="image" style="background-image: url('<?= $uri ?>public/assets/images/<?= $mainBanner ?>')">
          </div>

          <div class="info">
              <div>
                  <div class="container">
                      <h1>HAUNTZ</h1>
                      <em>"yeni bir başlangıç"</em>
                      <br>
                      <br>
                      <br>
                      <a class="btn btn-lg" href="indir">İndir</a>
                  </div>
              </div>
          </div>
      </section>
      <!-- /Banner -->

      <!-- Images With Text -->
      <div class="youplay-carousel" data-autoplay="5000">
          <?php foreach ($banners as $banner) { ?>
              <a class="angled-img" href="#">
                  <div class="img">
                      <img src="<?= $uri ?>public/assets/images/<?= $banner['banner'] ?>" alt="">
                  </div>
                  <!-- <div class="over-info">
                  <div>
                      <div>
                          <h4>Hava Desteği</h4>
                      </div>
                  </div>
              </div> -->
              </a>
          <?php } ?>
      </div>
      <!-- /Images With Text -->

      <!-- Preorder -->
      <div class="h2"></div>
      <section class="youplay-banner youplay-banner-parallax small">
          <div class="image" style="background-image: url('<?= $uri ?>public/assets/images/banner-witcher-3.jpg');">
          </div>

          <div class="info container align-center">
              <div>
                  <h2>Yaklaşan Etkinlik:<br> Ölüm Kalım Savaşları</h2>

                  <!-- See countdown init in bottom of the page -->
                  <div class="countdown h2" data-end="2023/05/09"></div>

                  <br>
                  <br>
                  <a class="btn btn-lg" href="kaydol">Şimdi Katıl!</a>
              </div>
          </div>
      </section>
      <!-- /Preorder -->


      <!-- Latest News -->
      <h2 class="container h1">Haberler</h2>
      <section class="youplay-news container">
          <?php foreach ($news as $new) { ?>
              <!-- Single News Block -->
              <div class="news-one">
                  <div class="row vertical-gutter">
                      <div class="col-md-4">
                          <a href="#" class="angled-img">
                              <div class="img">
                                  <img src="<?= $uri ?>public/assets/images/<?= $new['image'] ?>" alt="">
                              </div>
                          </a>
                      </div>
                      <div class="col-md-8">
                          <div class="clearfix">
                              <h3 class="h2 pull-left m-0"><a href="blog-post-1.html"><?= $new['title'] ?></a></h3>
                              <span class="date pull-right"><i class="fa fa-calendar"></i> <?= $new['date_added'] ?></span>
                          </div>
                          <div class="tags">
                              <i class="fa fa-tags"></i> <a href="#"><?= $new['tags'] ?></a>
                          </div>
                          <div class="description">
                              <p>
                                  <?= $new['description'] ?>
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /Single News Block -->
          <?php } ?>

          <div class="flex center" style="display:flex; place-content: center">
              <a href="haberler" class="btn btn-lg active">Tüm Haberler</a>
          </div>

      </section>
      <!-- /Latest News -->


      <!-- Partners -->
      <section class="youplay-banner youplay-banner-parallax small mt-80">
          <div class="image" style="background-image: url('<?= $uri ?>public/assets/images/banner-bg.jpg');">
          </div>

          <div class="info align-center">
              <div>
                  <h2 class="mb-40">Her Ay Ödül!</h2>
                  <h3>Sıralama birincisi ilk 3 oyuncu için her ay sürpriz ödüller!</h3>
              </div>
          </div>
      </section>
      <!-- /Partners -->
      <?= $footer ?>