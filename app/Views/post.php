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
                        <div style="display: flex; gap:10px">
                            <h4 class="text-dark mb-7">
                                <a href="<?= base_url() ?>">Home</a>
                            </h4>
                            <h4 class="text-dark mb-7">></h4>
                            <h4 class="text-dark mb-7 blog-title"></h4>
                        </div>
                        <!--begin::Post card-->
                        <div class="card">
                            <!--begin::Body-->
                            <div class="card-body p-lg-20 pb-lg-0">
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-xl-row">
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid me-xl-15">
                                        <!--begin::Post content-->
                                        <div class="mb-17">
                                            <!--begin::Wrapper-->
                                            <div class="mb-8">
                                                <!--begin::Info-->
                                                <div class="d-flex flex-wrap mb-6">
                                                    <!--begin::Item-->
                                                    <div class="me-9 my-1">
                                                        <!--begin::Icon-->
                                                        <i class="ki-duotone ki-element-11 text-primary fs-2 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i> <!--end::Icon-->

                                                        <!--begin::Label-->
                                                        <span class="fw-bold text-gray-400" id="blog-date"></span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="me-9 my-1">
                                                        <!--begin::Icon-->
                                                        <i class="ki-duotone ki-briefcase text-primary fs-2 me-1"><span class="path1"></span><span class="path2"></span></i> <!--end::Icon-->

                                                        <!--begin::Label-->
                                                        <span class="fw-bold text-gray-400" id="blog-category"></span>
                                                        <!--begin::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Info-->

                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fs-2 fw-bold blog-title">

                                                </a>
                                                <!--end::Title-->

                                                <!--begin::Container-->
                                                <div class="overlay mt-8">
                                                    <!--begin::Image-->
                                                    <img id="blog-image" style="width: 100%; height:auto" class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" src="" alt="">
                                                    <!--end::Image-->
                                                </div>
                                                <!--end::Container-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Description-->
                                            <div class="fs-5 fw-semibold text-gray-600">
                                                <!--begin::Text-->
                                                <p class="mb-8" id="blog-desc">

                                                </p>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Description-->

                                            <!--begin::Icons-->
                                            <div class="d-flex flex-center">
                                                <!--begin::Icon-->
                                                <a href="#" class="mx-4">
                                                    <img src="<?= base_url('public/') ?>assets/media/svg/brand-logos/facebook-4.svg" class="h-20px my-2" alt="">
                                                </a>
                                                <!--end::Icon-->

                                                <!--begin::Icon-->
                                                <a href="#" class="mx-4">
                                                    <img src="<?= base_url('public/') ?>assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px my-2" alt="">
                                                </a>
                                                <!--end::Icon-->

                                                <!--begin::Icon-->
                                                <a href="#" class="mx-4">
                                                    <img src="<?= base_url('public/') ?>assets/media/svg/brand-logos/github.svg" class="h-20px my-2" alt="">
                                                </a>
                                                <!--end::Icon-->

                                                <!--begin::Icon-->
                                                <a href="#" class="mx-4">
                                                    <img src="<?= base_url('public/') ?>assets/media/svg/brand-logos/behance.svg" class="h-20px my-2" alt="">
                                                </a>
                                                <!--end::Icon-->

                                                <!--begin::Icon-->
                                                <a href="#" class="mx-4">
                                                    <img src="<?= base_url('public/') ?>assets/media/svg/brand-logos/pinterest-p.svg" class="h-20px my-2" alt="">
                                                </a>
                                                <!--end::Icon-->

                                                <!--begin::Icon-->
                                                <a href="#" class="mx-4">
                                                    <img src="<?= base_url('public/') ?>assets/media/svg/brand-logos/twitter.svg" class="h-20px my-2" alt="">
                                                </a>
                                                <!--end::Icon-->

                                                <!--begin::Icon-->
                                                <a href="#" class="mx-4">
                                                    <img src="<?= base_url('public/') ?>assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px my-2" alt="">
                                                </a>
                                                <!--end::Icon-->
                                            </div>
                                            <!--end::Icons-->
                                        </div>
                                        <!--end::Post content-->
                                    </div>
                                    <!--end::Content-->

                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">

                                        <!--begin::Catigories-->
                                        <div class="mb-16">
                                            <h4 class="text-dark mb-7">Categories</h4>
                                            <div id="categories-list">

                                            </div>

                                        </div>
                                        <!--end::Catigories-->


                                        <!--begin::Recent posts-->
                                        <div class="m-0 similar-posts">
                                            <h4 class="text-dark mb-7">Similar Posts</h4>
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
                                    <a onclick="getCategoryListings(true)" class="btn btn-primary er fs-6 px-8 py-4">Continue </a>
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

    const getBlog = () => {
        $.get(`<?= base_url() ?>api/getBlog/<?= $current ?>`).then(data => {
            if (data && data.response) {
                $("#blog-category").html(data.response.category_title)
                $(".blog-title").html(data.response.title)
                $("#blog-date").html(data.response.createdat)
                $("#blog-desc").html(data.response.description)
                $("#blog-image").attr('src', `<?= base_url() ?>public/assets/media/blog/${data.response.image}`)
            }
        })
    }

    const getBlogsSimilar = () => {
        let html = ``

        $.get(`<?= base_url() ?>api/getBlogsSameCategory/<?= $current ?>`).then(data => {
            if ((data.response).length == 0) {
                $(".similar-posts").remove();
            } else {
                (data.response).map(val => {
                    html += `<div class="d-flex mb-7">
                                                <!--begin::Symbol-->

                                                <div class="symbol symbol-60px symbol-2by3 me-4">
                                                    <div class="symbol-label" style="background-image: url('<?= base_url() ?>public/assets/media/blog/${val.image}')"></div>
                                                </div>
                                                <!--end::Symbol-->

                                                <!--begin::Title-->
                                                <div class="m-0">
                                                    <a href="#" class="text-dark fw-bold text-hover-primary fs-6">${val.title}</a>

                                                    <span class="text-gray-600 fw-semibold d-block pt-1 fs-7">${val.description}</span>
                                                </div>
                                                <!--end::Title-->
                             </div>`
                })
                $("#similar-posts").html(html)
            }
        })


    }

    const getCategories = () => {
        let html = ``
        $.get(`<?= base_url() ?>api/categories`).then(data => {
            (data.response).map(val => {
                html += `                   <div class="d-flex flex-stack fw-semibold fs-5 text-muted mb-4">
                                                <!--begin::Text-->
                                                <a href="<?= base_url() ?>category/${val.seo}" class="text-muted text-hover-primary pe-2">
                                                    ${val.title} </a>
                                                <!--end::Text-->

                                                <!--begin::Number-->
                                                <div class="m-0">
                                                    ${val.blog_count} </div>
                                                <!--end::Number-->
                                            </div>`
            })

            $("#categories-list").html(html);
        })
    }

    const getCategoryListings = (nextPage = false) => {
        let html = ``;

        if (nextPage) {
            page = page + 1;
        }

        $.get(`<?= base_url() ?>api/getBlogsLastest?page=${page}&limit=6`).then(data => {
            if (!data.error) {
                if ((data.response).length == 0) {
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

    $(document).ready(() => {
        getBlog();
        getBlogsSimilar();
        getCategoryListings();
        getCategories();
    })
</script>