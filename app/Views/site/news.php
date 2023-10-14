      <?= $header ?>
      <div class="youplay-banner banner-top youplay-banner-parallax xsmall" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
          <div class="image" style="background-image: url(<?= $uri ?>public/assets/images/banner-blog-bg.jpg); transform: translate3d(0px, 0px, 0px);">
          </div>

          <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
              <div>
                  <div class="container">
                      <h1>Haberler</h1>
                  </div>
              </div>
          </div>
          <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;">
              <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 910.2px; height: 910.2px; overflow: hidden; pointer-events: none; margin-left: 0px; margin-top: -280.1px; visibility: visible;"></div>
          </div>
      </div>
      <!-- Latest News -->
      <section class="youplay-news container">
          <div class="news-append"></div>

          </div>
          <!-- /Single News Block -->

          <div class="flex center" style="display:flex; place-content: center">
              <button onclick="setPage()" class="btn btn-lg active">Devamı...</button>
          </div>

      </section>
      <!-- /Latest News -->


      <?= $footer ?>
      <script>
          let page = 1;

          const setPage = () => {
              page = page + 1;
              fetchNews();
          }

          const fetchNews = () => {
              $.get(`<?= $uri ?>getNews/${page}`).then(data => {
                  let html = ``;
                  if (data.length == 0) {
                      toastr.error(`Gösterilecek Haber Yok`)
                  } else {
                      data.map((val) => {
                          html += `
                    <!-- Single News Block -->
          <div class="news-one">
              <div class="row vertical-gutter">
                  <div class="col-md-4">
                      <a href="#" class="angled-img">
                          <div class="img">
                              <img src="<?= $uri ?>public/assets/images/${val.image}" alt="">
                          </div>
                      </a>
                  </div>
                  <div class="col-md-8">
                      <div class="clearfix">
                          <h3 class="h2 pull-left m-0"><a href="#">${val.title}</a></h3>
                          <span class="date pull-right"><i class="fa fa-calendar"></i>${val.date_added}</span>
                      </div>
                      <div class="tags">
                          <i class="fa fa-tags"></i> <a href="#">${val.tags}</a>
                      </div>
                      <div class="description">
                          <p>${val.description}</p>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /Single News Block -->`;
                      })
                  }
                  $(".news-append").append(html);
              })
          }

          $(document).ready(() => {
              fetchNews();
          })
      </script>