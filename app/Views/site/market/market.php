<?= $header ?>
<div class="youplay-banner banner-top youplay-banner-parallax xsmall" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
    <div class="image" style="background-image: url(<?= $uri ?>public/assets/images/banner-blog-bg.jpg); transform: translate3d(0px, 0px, 0px);">
    </div>

    <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
        <div>
            <div class="container">
                <h1><?= $page['title'] ?></h1>
            </div>
        </div>
    </div>
    <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;">
        <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 910.2px; height: 910.2px; overflow: hidden; pointer-events: none; margin-left: 0px; margin-top: -280.1px; visibility: visible;"></div>
    </div>
</div>

<div class="container">
    <div class="row vertical-gutter" style="padding-top: 5px">
        <?php foreach ($items as $item) { ?>
            <div class="col-md-4">
                <ul class="pricing-table">
                    <li class="plan-name">
                        <?= $item['title'] ?>
                    </li>
                    <li class="plan-price">
                        <?= $item['price'] ?>
                    </li>

                    <?php if ($item['attributes']) { ?>
                        <?php foreach ($item['attributes'] as $k => $v) { ?>
                            <li><?= $v ?></li>
                        <?php } ?>
                    <?php } ?>

                    <li class="plan-action">
                        <a class="btn btn-default" href="#">Satın Al</a>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>
<?= $footer ?>