<?= $header ?>
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->

        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->

            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid " id="kt_content">
                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class=" container-xxl ">
                        <!--begin::Post card-->
                        <div class="card">
                            <!--begin::Body-->
                            <div class="card-body p-lg-20 pb-lg-0">
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-xl-row">
                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                                        <!--begin::Recent posts-->
                                        <div class="m-0 similar-posts">
                                            <div style="display: flex; gap:10px">
                                                <h4 class="text-dark mb-7">
                                                    <a href="<?= base_url() ?>">Home</a>
                                                </h4>
                                                <h4 class="text-dark mb-7">></h4>
                                                <h4 class="text-dark mb-7" id="category-title"></h4>
                                            </div>
                                            <div id="similar-posts">

                                            </div>

                                        </div>
                                        <!--end::Recent posts-->
                                    </div>
                                    <!--end::Sidebar-->
                                </div>
                                <!--end::Layout-->

                                <!--begin::Section-->
                                <div class="mb-17">
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed mb-9"></div>
                                    <!--end::Separator-->

                                    <!--begin::Row-->
                                    <div id="category-listings" class="row g-10">

                                    </div>
                                    <!--end::Row-->

                                </div>
                                <div id="next-button" class="mb-17" style="text-align: center;">
                                    <a onclick="getCategoryListings(true)" class="btn btn-primary er fs-6 px-8 py-4"> Next Page </a>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Post card-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>

</div>


<?= $footer ?>
<script>
    let page = 1;

    const getCategoryListings = (nextPage = false) => {
        let html = ``;

        if (nextPage) {
            page = page + 1;
        }

        $.get(`<?= base_url() ?>api/category/<?= $current ?>?page=${page}&limit=6`).then(data => {
            if (!data.error) {
                $("#category-title").html(data.category_data.title)
                if ((data.blogs).length == 0) {
                    return $("#next-button").html(`<a class="btn btn-primary er fs-6 px-8 py-4">There is no blogs here!</a>`)
                } else {
                    (data.blogs).map(val => {
                        html += `<div class="col-md-4">
                                            <!--begin::Feature post-->
                                            <div class="card-xl-stretch me-md-6">
                                                <!--begin::Image-->
                                                <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" data-fslightbox="lightbox-video-tutorials" href="<?= base_url() ?>public/assets/media/blog/${val.image}">
                                                    <img class="banner-home" src="<?= base_url() ?>public/assets/media/blog/${val.image}" class="" alt="">
                                                </a>
                                                <!--end::Image-->

                                                <!--begin::Body-->
                                                <div class="m-0">
                                                    <!--begin::Title-->
                                                    <a href="<?= base_url() ?>blog/${val.seo}" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">
                                                        ${val.title} </a>
                                                    <!--end::Title-->

                                                    <!--begin::Text-->
                                                    <div class="fw-semibold fs-5 text-gray-600 text-dark my-4">
                                                        ${val.description}
                                                    </div>
                                                    <!--end::Text-->

                                                    <!--begin::Content-->
                                                    <div class="fs-6 fw-bold">
                                                        <!--begin::Author-->
                                                        <a href="<?= base_url() ?>blog/${val.seo}" class="text-gray-700 text-hover-primary">${val.username}</a>
                                                        <!--end::Author-->

                                                        <!--begin::Date-->
                                                        <span class="text-muted">${val.createdat}</span>
                                                        <!--end::Date-->
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Feature post-->
                        </div>`
                    })
                }
            }
            return $("#category-listings").append(html)
        })

    }

    $(document).ready(() => {
        getCategoryListings();
    })
</script>