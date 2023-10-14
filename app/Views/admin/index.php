<?= $header ?>

<!-- App container starts -->
<div class="app-container">
    <!-- App body starts -->
    <div class="app-body">
        <!-- Container starts -->
        <div class="container-fluid">
            <!-- Row start -->
            <div class="row">
                <div class="col-xl-6 col-12">
                    <div class="row">
                        <div class="col-4">
                            <div class="card px-3 py-2 mb-4 d-flex flex-row align-items-center">
                                <div class="ms-2">
                                    <h3 class="m-0 fw-semibold"><?= $totalAccounts ?></h3>
                                    <h6 class="m-0 fw-light">Toplam Hesap</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card px-3 py-2 mb-4 d-flex flex-row align-items-center">
                                <div class="ms-2">
                                    <h3 class="m-0 fw-semibold"><?= $totalAccountsBanned ?></h3>
                                    <h6 class="m-0 fw-light">Yasaklı Hesap</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card px-3 py-2 mb-4 d-flex flex-row align-items-center">
                                <div class="ms-2">
                                    <h3 class="m-0 fw-semibold"><?= $totalChars ?></h3>
                                    <h6 class="m-0 fw-light">Toplam Karakter</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Son Oluşturulan Hesaplar</h5>
                        </div>
                        <div class="card-body">
                            <div class="border rounded-3">
                                <div class="table-responsive">
                                    <table class="table align-middle custom-table m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Email</th>
                                                <th>Durumu</th>
                                                <th>Kayıt Tarihi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lastAccounts as $account) { ?>
                                                <tr>
                                                    <td><?= $account['CustomerID'] ?></td>
                                                    <td>
                                                        <div class="fw-semibold"><?= $account['email'] ?></div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-info"><?= $account['AccountStatus'] == 100 ? 'NORMAL' : 'YASAKLI' ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge border border-info text-info"><?= $account['dateregistered'] ?></span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Yasaklanan Hesaplar</h5>
                        </div>
                        <div class="card-body">
                            <div class="border rounded-3">
                                <div class="table-responsive">
                                    <table class="table align-middle custom-table m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Email</th>
                                                <th>Durumu</th>
                                                <th>Kayıt Tarihi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php if ($accountsBanned && count($accountsBanned) > 0) { ?>
                                                <?php foreach ($accountsBanned as $account) { ?>
                                                    <tr>
                                                        <td><?= $account['CustomerID'] ?></td>
                                                        <td>
                                                            <div class="fw-semibold"><?= $account['email'] ?></div>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-info"><?= $account['AccountStatus'] == 100 ? 'NORMAL' : 'YASAKLI' ?></span>
                                                        </td>
                                                        <td>
                                                            <span class="badge border border-info text-info"><?= $account['dateregistered'] ?></span>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            <?php } else { ?>
                                                <tr><h2>Hesap bulunamadı!</h2></tr>
                                            <?php } ?>
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