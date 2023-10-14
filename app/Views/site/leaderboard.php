<?= $header ?>
<div class="youplay-banner banner-top youplay-banner-parallax xsmall" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
    <div class="image" style="background-image: url(<?= $uri ?>public/assets/images/banner-blog-bg.jpg); transform: translate3d(0px, 0px, 0px);">
    </div>

    <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
        <div>
            <div class="container">
                <h1>Sıralama</h1>
            </div>
        </div>
    </div>
    <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;">
        <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 910.2px; height: 910.2px; overflow: hidden; pointer-events: none; margin-left: 0px; margin-top: -280.1px; visibility: visible;"></div>
    </div>
</div>
<div class="container">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Oyuncu Adı</th>
                <th>Öldürme Sayısı</th>
                <th>Z. Öldürme Sayısı</th>
                <th>Hayatta Kalma Süresi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leader as $row) { ?>
                <tr>
                    <th scope="row"><?= $row['Pos'] ?></th>
                    <td><?= $row['Gamertag'] ?></td>
                    <td><?= $row['Stat04'] + $row['Stat05'] ?></td>
                    <td><?= $row['Stat00'] ?></td>
                    <td><?= $row['TimePlayed'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?= $footer ?>