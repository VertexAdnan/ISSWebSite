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
                    <li class="breadcrumb-item">Market</li>
                    <li class="breadcrumb-item text-primary">
                        Market
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
                                <label class="form-label">Başlık</label>
                                <input id="title" type="text" name="item_title" class="form-control" placeholder="1000 GC">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Sayfa</label>
                                <select class="form-control" name="page_id" id="market_id">
                                    <option value="0" disabled selected>Seçiniz</option>
                                    <?php foreach($markets as $market){ ?>
                                        <option value="<?= $market['market_id'] ?>"><?= $market['title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Fiyat</label>
                                <input id="price" type="text" name="price" class="form-control" placeholder="100">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Özellikler</label>
                                <input id="attrs" type="text" name="attrs" class="form-control" placeholder="10 stanag, 20 c-mag, 1 aw magnum">
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
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($items)) {
                                            foreach ($items as $item) { ?>
                                                <tr class="item-<?= $item['item_id'] ?>">
                                                    <td><?= $item['title'] ?></td>
                                                    <td>
                                                        <button onclick="handleGetItem(<?= $item['item_id'] ?>)" class="border p-2 rounded-3">
                                                            <span class="fs-3 icon-credit-card"></span>
                                                        </button>
                                                        <button onclick="handleDeleteItem(<?= $item['item_id'] ?>)" class="border p-2 rounded-3">
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
    const handleDeleteItem = (item_id) => {
        $.ajax(`<?= $uri ?>admin/market/handleRemoveItem/${item_id}`, {
            type: 'GET',
            dataType: 'JSON'
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                toastr.success(data.response)
                $(`.market-${item_id}`).remove();
            }
        })
    }

    const handleGetItem = (item_id) => {
        $.get(`<?= $uri ?>admin/market/handleGetItem/${item_id}`).then(data => {
            if (data.error) {
                toastr.error('Item bulunamadı!')
            } else {
                $(".hidden-input").remove(); // remove old input

                $("#title").val(data.data.title)
                $("#price").val(data.data.price)
                $("#attrs").val(data.data.attributes)
                $("#market_id").val(data.data.market_id)
                $("form").append(`<input type='hidden' class="hidden-input" name='item_id' value='${item_id}' />`)
            }
        })
    }
</script>