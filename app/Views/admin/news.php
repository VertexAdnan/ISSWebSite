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
                    <li class="breadcrumb-item">Haberler</li>
                    <li class="breadcrumb-item text-primary">
                        Haberler
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
                                <input id="title" type="text" name="title" class="form-control" placeholder="Başlık">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Taglar</label>
                                <input id="tags" type="text" name="tags" class="form-control" placeholder="HAUNTZ, HAUNTZGAME">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">İçerik</label>
                                <textarea id="desc" name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Görsel</label>
                                <input name="file" class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
                </div>

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
                        <h5 class="card-title">Haberler</h5>
                    </div>
                    <div class="card-body">
                        <div class="border rounded-3">
                            <div class="table-responsive">
                                <table class="table align-middle custom-table m-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Başlık</th>
                                            <th>İçerik</th>
                                            <th>Tag</th>
                                            <th>Kayıt Tarihi</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($news)) {
                                            foreach ($news as $new) { ?>
                                                <tr class="news-<?= $new['news_id'] ?>">
                                                    <td><img width="100" src="<?= $uri ?>public/assets/images/<?= $new['image'] ?>" alt=""></td>
                                                    <td><?= $new['title'] ?></td>
                                                    <td>
                                                        <div class="fw-semibold"><?= $new['description'] ?></div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-info"><?= $new['tags'] ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge border border-info text-info"><?= $new['date_added'] ?></span>
                                                    </td>
                                                    <td>
                                                        <button onclick="handleGetNew(<?= $new['news_id'] ?>)" class="border p-2 rounded-3">
                                                            <span class="fs-3 icon-credit-card"></span>
                                                        </button>
                                                        <button onclick="handleDeleteNew(<?= $new['news_id'] ?>)" class="border p-2 rounded-3">
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

    const handleDeleteNew = (new_id) => {
        $.ajax(`<?= $uri ?>admin/news/delete/${new_id}`, {
            type: 'GET',
            dataType: 'JSON'
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                toastr.success(data.response)
                $(`.news-${new_id}`).remove();
            }
        })
    }

    const handleGetNew = (new_id) => {
        $.get(`<?= $uri ?>admin/news/get/${new_id}`).then(data => {
            if (data.error) {
                toastr.error('Haber bulunamadı!')
            } else {
                $("#title").val(data.data.title)
                $("#desc").val(data.data.description)
                $("#tags").val(data.data.tags)

                $("form").append(`<input type='hidden' name='news_id' value='${new_id}' />`)
            }
        })
    }
</script>