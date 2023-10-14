<?= $header ?>

<!-- App body starts -->
<div class="app-body">

    <!-- Container starts -->
    <div class="container-fluid">

        <!-- Row start -->
        <div class="row">
            <div class="col-12 col-xl-6">

                <!-- Breadcrumb start -->
                <ol class="breadcrumb d-none d-lg-flex mb-4">
                    <li class="breadcrumb-item">
                        <i class="icon-home lh-1"></i>
                        <a href="<?= $uri ?>/admin" class="text-decoration-none">Anasayfa</a>
                    </li>
                    <li class="breadcrumb-item">Bannerlar</li>
                    <li class="breadcrumb-item text-primary">
                        Bannerlar
                    </li>
                </ol>
                <!-- Breadcrumb end -->

            </div>
        </div>
        <!-- Row end -->

        <?php if (isset($success)) {
            if ($success == 'true') { ?>
                <h2 style="color: green;">İşlem Başarılı!</h2>
            <?php } else { ?>
                <h2 style="color: red;">İşlem Başarısız!</h2>
        <?php }
        } ?>

        <!-- Row start -->
        <div class="row">
            <form method="POST" enctype="multipart/form-data">
                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Banner</label>
                                <input id="file" type="file" name="file" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Ana Banner</label>
                                <select class="form-control" name="main" id="main">
                                    <option value="1" selected default>Evet</option>
                                    <option value="0">Hayır</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Durum</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1" selected default>Aktif</option>
                                    <option value="0">Kapalı</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-xl-12">
                    <button type="submit" type="button" class="btn btn-info">
                        <i class="icon-archive"></i> Kaydet
                    </button>
                </div>
            </form>
        </div>
        <!-- Row end -->
        <hr>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Bannerlar</h5>
                    </div>
                    <div class="card-body">
                        <div class="border rounded-3">
                            <div class="table-responsive">
                                <table class="table align-middle custom-table m-0">
                                    <thead>
                                        <tr>
                                            <th>Banner</th>
                                            <th>Ana Banner</th>
                                            <th>Durum</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($banners)) {
                                            foreach ($banners as $banner) { ?>
                                                <tr class="banner-<?= $banner['banner_id'] ?>">
                                                    <td>
                                                        <img src="<?= $uri ?>/public/assets/images/<?= $banner['banner'] ?>" width="150" alt="">
                                                    </td>
                                                    <td><?= $banner['main'] == 1 ? 'Üst Banner' : 'Alt Banner' ?></td>
                                                    <td><?= $banner['status'] == 1 ? 'Aktif' : 'Kapalı' ?></td>
                                                    <td>
                                                        <button onclick="handleGetCoupon(<?= $banner['banner_id'] ?>)" class="border p-2 rounded-3">
                                                            <span class="fs-3 icon-credit-card"></span>
                                                        </button>
                                                        <button onclick="handleRemoveCoupon(<?= $banner['banner_id'] ?>)" class="border p-2 rounded-3">
                                                            <span class="fs-3 icon-trash"></span>
                                                        </button>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container ends -->

</div>
<!-- App body ends -->
<?= $footer ?>

<script>
    const handleDeletePage = (banner_id) => {
        $.ajax(`<?= $uri ?>admin/banners/handleRemoveBanner/${banner_id}`, {
            type: 'GET',
            dataType: 'JSON'
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                toastr.success(data.response)
                $(`.coupon-${banner_id}`).remove();
            }
        })
    }

    const handleGetCoupon = (banner_id) => {
        $.get(`<?= $uri ?>admin/banners/handleGetBanner/${banner_id}`).then(data => {
            if (data.error) {
                toastr.error('Sayfa bulunamadı!')
            } else {
                $(".hidden-input").remove(); // remove old input

                $("#main").val(data.data.main)
                $("#status").val(data.data.status)
                $("form").append(`<input type='hidden' class="hidden-input" name='banner_id' value='${banner_id}' />`)
            }
        })
    }
</script>