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
                        <a href="<?= $uri ?>admin" class="text-decoration-none">Anasayfa</a>
                    </li>
                    <li class="breadcrumb-item text-primary">Oyuncular</li>
                </ol>
                <!-- Breadcrumb end -->

            </div>
        </div>
        <!-- Row end -->

        <!-- Row start -->
        <div class="row">
            <div class="col-12">

                <!-- Card start -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-title">Oyuncu Listesi</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basicExample" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Oynama Süresi</th>
                                        <th>Hesap Türü</th>
                                        <th>Hesap Durumu</th>
                                        <th>GC</th>
                                        <th>DOLAR</th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($customers as $customer) { ?>
                                        <tr>
                                            <td><?= $customer['CustomerID'] ?></td>
                                            <td><?= $customer['email'] ?></td>
                                            <td><?= $customer['TimePlayed'] ?></td>
                                            <td class="vip-<?= $customer['CustomerID'] ?>"><?= $customer['isPremium'] ? 'Premium' : 'NORMAL' ?></td>
                                            <td class="status-<?= $customer['CustomerID'] ?>"><?= $customer['accountStatus'] ?></td>
                                            <td class="gc-<?= $customer['CustomerID'] ?>"><?= $customer['GamePoints'] ?></td>
                                            <td class="gd-<?= $customer['CustomerID'] ?>"><?= $customer['GameDollars'] ?></td>
                                            <td><button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    İşlem
                                                </button>
                                                <ul class="dropdown-menu" style="">
                                                    <li>
                                                        <button onclick="gcModal(<?= $customer['CustomerID'] ?>)" class="dropdown-item">GC Ver</button>
                                                    </li>
                                                    <li>
                                                        <button onclick="gdModal(<?= $customer['CustomerID'] ?>)" class="dropdown-item">Dolar Ver</button>
                                                    </li>
                                                    <li>
                                                        <button onclick="premiumModal(<?= $customer['CustomerID'] ?>)" class="dropdown-item">Premium Ver</button>
                                                    </li>
                                                    <li>
                                                        <button onclick="setBan(<?= $customer['CustomerID'] ?>)" class="dropdown-item">Banla</button>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Card end -->



            </div>
        </div>
        <!-- Row end -->

    </div>
    <!-- Container ends -->

</div>
<!-- App body ends -->
<?= $footer ?>

<script>
    const removeModal = () => {
        return $(".modal").remove()
    }
    const gcModal = (customer_id) => {
        let html = `<div class="modal fade show" tabindex="-1"  role="dialog" style="display: block;">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">
																GC Gönder - AL
															</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
                                                            <input type="text" class="form-control gc-value" placeholder="GC Miktarı">
                                                            <select class="form-select gc-add">
                                                                <option value="1" selected>Ekle</option>
                                                                <option value="0">Al</option>
                                                            </select>
                                                        </div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" onclick="removeModal()">
																Kapat
															</button>
															<button type="button" onclick="addGC(${customer_id})" class="btn btn-primary">
																Kaydet
															</button>
														</div>
													</div>
												</div>
											</div>`

        return $(".page-wrapper").append(html);
    }
    const addGC = (customer_id) => {
        var gc = $(".gc-value").val();
        var add = $(".gc-add").val();

        $.ajax(`<?= $uri ?>admin/accounts/setGC/${customer_id}`, {
            type: 'POST',
            dataType: 'JSON',
            data: {
                gc: gc,
                add: add
            }
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                var current = parseInt($(`.gc-${customer_id}`).html())
                let newVal = 0;
                if (add && add == 1) {
                    newVal = parseInt(current) + parseInt(gc)
                } else {
                    newVal = parseInt(current) - parseInt(gc)
                }
                $(`.gc-${customer_id}`).html(newVal)
                toastr.success(data.response)
                removeModal();
            }
        })
    }

    const gdModal = (customer_id) => {
        let html = `<div class="modal fade show" tabindex="-1"  role="dialog" style="display: block;">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">
																GD Gönder - AL
															</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
                                                            <input type="text" class="form-control gd-value" placeholder="GC Miktarı">
                                                            <select class="form-select gc-add">
                                                                <option value="1" selected>Ekle</option>
                                                                <option value="0">Al</option>
                                                            </select>
                                                        </div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" onclick="removeModal()">
																Kapat
															</button>
															<button type="button" onclick="addGD(${customer_id})" class="btn btn-primary">
																Kaydet
															</button>
														</div>
													</div>
												</div>
											</div>`

        return $(".page-wrapper").append(html);
    }

    const addGD = (customer_id) => {
        var gd = $(".gd-value").val();
        var add = $(".gc-add").val();

        $.ajax(`<?= $uri ?>admin/accounts/setGD/${customer_id}`, {
            type: 'POST',
            dataType: 'JSON',
            data: {
                gd: gd,
                add: add
            }
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                var current = parseInt($(`.gd-${customer_id}`).html())
                let newVal = 0;
                if (add && add == 1) {
                    newVal = parseInt(current) + parseInt(gd)
                } else {
                    newVal = parseInt(current) - parseInt(gd)
                }
                $(`.gd-${customer_id}`).html(newVal)
                toastr.success(data.response)
                removeModal();
            }
        })
    }

    const premiumModal = (customer_id) => {
        let html = `<div class="modal fade show" tabindex="-1"  role="dialog" style="display: block;">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">
																Premium
															</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control vip-value" placeholder="Gün Sayısı">
                                                        </div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" onclick="removeModal()">
																Kapat
															</button>
															<button type="button" onclick="addVIP(${customer_id})" class="btn btn-primary">
																Kaydet
															</button>
														</div>
													</div>
												</div>
											</div>`

        return $(".page-wrapper").append(html);
    }

    const addVIP = (customer_id) => {
        var days = $(".vip-value").val();

        $.ajax(`<?= $uri ?>admin/accounts/setPremium/${customer_id}`, {
            type: 'POST',
            dataType: 'JSON',
            data: {
                days: days
            }
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                $(`.vip-${customer_id}`).html('PREMIUM')
                toastr.success(data.response)
                removeModal();
            }
        })
    }

    const setBan = (customer_id) => {
        $.ajax(`<?= $uri ?>admin/accounts/setStatus/${customer_id}`, {
            type: 'POST',
            dataType: 'JSON'
        }).then(data => {
            if (data.error) {
                toastr.error(data.response)
            } else {
                if(data.status == 'ban'){
                    $(`.status-${customer_id}`).html('YASAKLI')
                } else {
                    $(`.status-${customer_id}`).html('NORMAL')
                }
                
                toastr.success(data.response)
            }
        })
    }
</script>