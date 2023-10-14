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
                    <li class="breadcrumb-item">Kupon</li>
                    <li class="breadcrumb-item text-primary">
                        Kupon
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
                                <label class="form-label">Kupon Kodu</label>
                                <input id="coupon" type="text" name="coupon" class="form-control" placeholder="ABCDFEFGFD">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Dolar</label>
                                <input id="dollar" type="text" name="dollar" class="form-control" placeholder="1000">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">GC</label>
                                <input id="gc" type="text" name="gc" class="form-control" placeholder="1000">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Premium Gün Sayısı</label>
                                <input id="vipdays" type="text" name="vipdays" class="form-control" placeholder="7">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Adet</label>
                                <input id="count" type="text" name="count" class="form-control" placeholder="1">
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
                        <h5 class="card-title">Sayfalar</h5>
                    </div>
                    <div class="card-body">
                        <div class="border rounded-3">
                            <div class="table-responsive">
                                <table class="table align-middle custom-table m-0">
                                    <thead>
                                        <tr>
                                            <th>Başlık</th>
                                            <th>Dolar</th>
                                            <th>GC</th>
                                            <th>Vipdays</th>
                                            <th>Adet</th>
                                            <th>Kullanılan</th>
                                            <th>Durum</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($coupons)) {
                                            foreach ($coupons as $coupon) { ?>
                                                <tr class="market-<?= $coupon['coupon_id'] ?>">
                                                    <td><?= $coupon['coupon'] ?></td>
                                                    <td><?= $coupon['dollar'] ?></td>
                                                    <td><?= $coupon['gc'] ?></td>
                                                    <td><?= $coupon['vipdays'] ?></td>
                                                    <td><?= $coupon['count'] ?></td>
                                                    <td><?= $coupon['used'] ?></td>
                                                    <td><?= $coupon['status'] ?></td>
                                                    <td>
                                                        <button onclick="handleGetCoupon(<?= $coupon['coupon_id'] ?>)" class="border p-2 rounded-3">
                                                            <span class="fs-3 icon-credit-card"></span>
                                                        </button>
                                                        <button onclick="handleRemoveCoupon(<?= $coupon['coupon_id'] ?>)" class="border p-2 rounded-3">
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
    const handleDeletePage = (coupon_id) => {
        $.ajax(`<?= $uri ?>admin/coupons/handleRemoveCoupon/${coupon_id}`, {
            type: 'GET',
            dataType: 'JSON'
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                toastr.success(data.response)
                $(`.coupon-${coupon_id}`).remove();
            }
        })
    }

    const handleGetCoupon = (coupon_id) => {
        $.get(`<?= $uri ?>admin/coupons/handleGetCoupon/${coupon_id}`).then(data => {
            if (data.error) {
                toastr.error('Sayfa bulunamadı!')
            } else {
                $(".hidden-input").remove(); // remove old input

                $("#coupon").val(data.data.coupon)
                $("#dollar").val(data.data.dollar)
                $("#gc").val(data.data.gc)
                $("#vipdays").val(data.data.vipdays)
                $("#count").val(data.data.count)
                $("form").append(`<input type='hidden' class="hidden-input" name='coupon_id' value='${coupon_id}' />`)
            }
        })
    }
</script>