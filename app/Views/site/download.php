<?= $header ?>
<div class="youplay-banner banner-top youplay-banner-parallax xsmall" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
    <div class="image" style="background-image: url(<?= $uri ?>public/assets/images/banner-blog-bg.jpg); transform: translate3d(0px, 0px, 0px);">
    </div>

    <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
        <div>
            <div class="container">
                <h1>Oyun İndir</h1>
            </div>
        </div>
    </div>
    <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;">
        <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 910.2px; height: 910.2px; overflow: hidden; pointer-events: none; margin-left: 0px; margin-top: -280.1px; visibility: visible;"></div>
    </div>
</div>
<div class="container" style="padding-top: 20px">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach ($links as $key => $link) { ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?=$key?>">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key?>" aria-expanded="true" aria-controls="collapse<?=$key?>">
                            <?= $link['title'] ?> <span class="icon-plus"></span>
                        </a>
                    </h4>
                </div>
                <div id="collapse<?=$key?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$key?>">
                    <div class="panel-body">
                        <a href="<?= $link['link'] ?>" class="btn active btn-danger">İndir</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?= $footer ?>