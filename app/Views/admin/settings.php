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
                                <label class="form-label">Site Adı</label>
                                <input value="<?= $settings['sitename'] ?>" type="text" name="sitename" class="form-control" placeholder="Hauntz">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Açıklama</label>
                                <input value="<?= $settings['description'] ?>" type="text" name="description" class="form-control" placeholder="HAUNTZ, HAUNTZGAME">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Discord</label>
                                <input value="<?= $settings['discord'] ?>" type="text" name="discord" class="form-control" placeholder="HAUNTZ, HAUNTZGAME">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Youtube</label>
                                <input value="<?= $settings['youtube'] ?>" type="text" name="youtube" class="form-control" placeholder="HAUNTZ, HAUNTZGAME">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="m-0">
                                <label class="form-label">Görsel</label>
                                <input name="logo" class="form-control" type="file">
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