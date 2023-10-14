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

                <!--begin::Toolbar-->
                <div class="toolbar d-flex flex-stack mb-3 mb-lg-5" id="kt_toolbar">
                    <!--begin::Container-->

                    <!--end::Container-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class=" container-xxl ">
                        <!--begin::Home card-->
                        <div class="card">
                            <!--begin::Body-->
                            <div class="card-body p-lg-20">
                                <!--begin::Section-->
                                <div class="mb-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark mb-7">Latest Articles, News &amp; Updates</h3>
                                    <!--end::Title-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed mb-9"></div>
                                    <!--end::Separator-->

                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div id="starred-post" class="col-md-6">
                                            <!--begin::Feature post-->

                                            <!--end::Feature post-->
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div id="posts-home" class="col-md-6 justify-content-between d-flex flex-column">
                                            <!--begin::Post-->

                                            <!--end::Post-->

                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Row-->
                                </div>
                                <!--end::Section-->







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
                                    <a onclick="getCategoryListings(true)" class="btn btn-primary er fs-6 px-8 py-4">Continue </a>
                                </div>
                                <!--end::Section-->

                                <!--begin::latest instagram-->
                                <div class="">
                                    <!--begin::Section-->
                                    <div class="m-0">
                                        <!--begin::Content-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Title-->
                                            <h3 class="text-dark">Gallery</h3>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Content-->

                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed border-gray-300 mb-9 mt-5"></div>
                                        <!--end::Separator-->
                                    </div>
                                    <!--end::Section-->

                                    <!--begin::Row-->
                                    <div id="gallery" class="row g-10 row-cols-2 row-cols-lg-5">
                                        <!--begin::Col-->

                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Row-->
                                </div>
                                <!--end::latest instagram-->



                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Home card-->

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->

            <!--begin::Footer-->

            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<?= $footer ?>

<script>
    let page = 1;

    const getPosts = () => {
        let html = ``

        $.get(`<?= base_url() ?>api/getBlogsLastest?limit=3&ignore=1`).then(data => {
            if (!data.error) {
                (data.response).map(val => {
                    html += `<div class="ps-lg-6 mb-16 mt-md-0 mt-17">
                                                <!--begin::Body-->
                                                <div class="mb-6">
                                                    <!--begin::Title-->
                                                    <a href="<?= base_url() ?>blog/${val.seo}" class="fw-bold text-dark mb-4 fs-2 lh-base text-hover-primary">
                                                        ${val.title} 
                                                    </a>
                                                    <!--end::Title-->

                                                    <!--begin::Text-->
                                                    <div class="fw-semibold fs-5 mt-4 text-gray-600 text-dark">
                                                        ${val.description}
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Body-->

                                                <!--begin::Footer-->
                                                <div class="d-flex flex-stack flex-wrap">
                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center pe-2">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle me-3">
                                                            <img src="<?= base_url('public/') ?>assets/media/avatars/300-20.jpg" class="" alt="">
                                                        </div>
                                                        <!--end::Avatar-->

                                                        <!--begin::Text-->
                                                        <div class="fs-5 fw-bold">
                                                            <a href="#" class="text-gray-700 text-hover-primary">${val.username}</a>

                                                            <span class="text-muted">${val.createdat}</span>
                                                        </div>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Label-->
                                                    <span class="badge badge-light-info fw-bold my-2">${val.category_title}</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Footer-->
               </div>`
                })

                $("#posts-home").html(html)
            }
        })
    }

    const getStarredPost = () => {
        let html = ``

        $.get(`<?= base_url() ?>api/getBlogStarred`).then(data => {
            html += `<div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
                                                <!--begin::Video-->
                                                <div class="mb-3">
                                                    <img class="banner-home" src="<?= base_url() ?>public/assets/media/blog/${data.response.image}" alt="">
                                                </div>
                                                <!--end::Video-->

                                                <!--begin::Body-->
                                                <div class="mb-5">
                                                    <!--begin::Title-->
                                                    <a href="<?= base_url() ?>blog/${data.response.seo}" class="fs-2 text-dark fw-bold text-hover-primary text-dark lh-base">
                                                        ${data.response.title}
                                                    </a>
                                                    <!--end::Title-->

                                                    <!--begin::Text-->
                                                    <div class="fw-semibold fs-5 text-gray-600 text-dark mt-4">
                                                        ${data.response.description}
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Body-->

                                                <!--begin::Footer-->
                                                <div class="d-flex flex-stack flex-wrap">
                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center pe-2">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle me-3">
                                                            <img alt="" src="<?= base_url('public/') ?>assets/media/avatars/300-9.jpg">
                                                        </div>
                                                        <!--end::Avatar-->

                                                        <!--begin::Text-->
                                                        <div class="fs-5 fw-bold">
                                                            <a href="#">${data.response.username}</a>
                                                            <span class="text-muted">${data.response.createdat}</span>
                                                        </div>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Label-->
                                                    <span class="badge badge-light-primary fw-bold my-2">${data.response.category_title}</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Footer-->
                                            </div>`
            return $("#starred-post").html(html);
        })
    }

    const getCategoryListings = (nextPage = false) => {
        let html = ``;

        if(nextPage){
            page = page + 1;
        }

        $.get(`<?= base_url() ?>api/getBlogsLastest?page=${page}&limit=6`).then(data => {
            if (!data.error) {
                if((data.response).length == 0){
                    return $("#next-button").html(`<a class="btn btn-primary er fs-6 px-8 py-4">There is no blogs here!</a>`)
                } else {
                (data.response).map(val => {
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



    const getGallery = () => {
        let html = ``;


        $.get(`<?= base_url() ?>api/gallery`).then(data => {
            (data.response).map(val => {
                html += `<div class="col">
                                            <!--begin::Overlay-->
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="<?= base_url('public/') ?>assets/media/blog/${val.image}">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('<?= base_url('public/') ?>assets/media/blog/${val.image}')">
                                                </div>
                                                <!--end::Image-->

                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="ki-duotone ki-eye fs-3x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                         </div>`
            })

            $("#gallery").html(html)
        })
    }

    $(document).ready(() => {
        getPosts();
        getStarredPost();
        getCategoryListings();
        getGallery();
    })
</script>