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
                    <li class="breadcrumb-item">İndirmeler</li>
                    <li class="breadcrumb-item text-primary">
                        İndirmeler
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
                                <input id="title" type="text" name="title" class="form-control" placeholder="Google Drive Full">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Link</label>
                                <input id="link" type="text" name="link" class="form-control" placeholder="https://google.com/">
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
                                            <th>Link</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($downloads)) {
                                            foreach ($downloads as $download) { ?>
                                                <tr class="download-<?= $download['download_id'] ?>">
                                                    <td><?= $download['title'] ?></td>
                                                    <td><a href="<?= $download['link'] ?>"><?= $download['link'] ?></a> </td>
                                                    <td>
                                                        <button onclick="handleGetDownload(<?= $download['download_id'] ?>)" class="border p-2 rounded-3">
                                                            <span class="fs-3 icon-credit-card"></span>
                                                        </button>
                                                        <button onclick="handleRemoveDownload(<?= $download['download_id'] ?>)" class="border p-2 rounded-3">
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
    const handleRemoveDownload = (download_id) => {
        $.ajax(`<?= $uri ?>admin/downloads/handleRemoveDownload/${download_id}`, {
            type: 'GET',
            dataType: 'JSON'
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                toastr.success(data.response)
                $(`.download-${download_id}`).remove();
            }
        })
    }

    const handleGetDownload = (download_id) => {
        $.get(`<?= $uri ?>admin/downloads/handleGetDownload/${download_id}`).then(data => {
            if (data.error) {
                toastr.error('Link bulunamadı!')
            } else {
                $(".hidden-input").remove(); // remove old input

                $("#title").val(data.data.title)
                $("#link").val(data.data.link)
                $("form").append(`<input type='hidden' class="hidden-input" name='download_id' value='${download_id}' />`)
            }
        })
    }
</script>