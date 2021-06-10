            <!-- order view -->
            <?php $this->load->view('backend/partials/header'); ?>
            <div class="c-subheader justify-content-between px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('blogs'); ?>">Blogs</a></li>
                    <li class="breadcrumb-item active"><?php echo $blog->title; ?></li>
                    <!-- Breadcrumb Menu-->
                </ol>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1>Edit Blog Form</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="blog-form" name="blog-form" method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $blog->id; ?>" />
                                    <input type="hidden" name="blog_link" value="<?php echo $blog->link; ?>" />
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#detail" role="tab" aria-controls="detail">
                                                Form Data
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#preview" role="tab" aria-controls="preview">
                                                Blog Image Preview
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="detail" role="tabpanel">
                                            <br/>
                                            <!-- title -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title" class="font-weight-bold">Title<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="title" type="text" required="" value="<?php echo $blog->title; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- number of views -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="number_of_views" class="font-weight-bold">Number of Views<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="number_of_views" type="number" required="" value="<?php echo $blog->number_of_views; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- image -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="link" class="font-weight-bold">Blog Image <span class="text-muted font-weight-bold">(JPEG,PNG Only)</span></label>
                                                        <input class="form-control-file" name="link" type="file" accept=".jpg,.png" />
                                                    </div>
                                                </div>
                                            </div>

                                            <br/>
                                            <!-- message -->
                                            <input type="hidden" name="message" id="content_message" />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div id="editor" style="height: 400px;"><?php echo $blog->message; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <button class="btn btn-block btn-dark" type="submit"><strong>Save</strong></button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span class="btn btn-block btn-danger" onclick="delete_record();"><strong>Delete</strong></span>
                                                </div>
                                            </div>
                                            <br/>
                                        </div>
                                        <div class="tab-pane" id="preview" role="tabpanel">
                                            <br/>
                                            <!-- sample preview -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="document-preview" style="width: 100%; height: 500px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="c-footer">
                <div>
                    <a href="#"><?php echo $_ENV['SITE_TITLE']; ?></a> &copy;<?php echo date('Y'); ?>
                </div>
                <div class="ml-auto">Supported by&nbsp;<?php echo $_ENV['SUPPORT_ORGANISATION']; ?></div>
            </footer>
        </div>
        <?php $this->load->view('backend/partials/scripts'); ?>


        <script type="text/javascript">
             var quill;

            $(document).ready(function(){
                // quill editor
                quill = new Quill('#editor', {
                    modules: {
                        toolbar: quill_toolbar_options
                    },
                    theme: 'snow'
                });

                var image_link = '<?php echo base_url('uploads/blog'); ?>/<?php echo $blog->link; ?>';
                PDFObject.embed(image_link, "#document-preview");

                $("form[name='blog-form']").submit(function(e) {
                    var html = quill.root.innerHTML;
                    $('#content_message').val(html);

                    var formData = new FormData($(this)[0]);
                    var loading = new Loading();

                    $.ajax({
                        url: '<?php echo site_url('blogs/save'); ?>',
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        success: function(response) {
                            loading.out();
                        },
                        error: function(xhr, status, error) {
                            loading.out();
                        },
                        statusCode: {
                            204: function(request, status, error){
                                Swal.fire({
                                    text: 'blog updated!',
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                });
                            },
                            400: function(request, status, error){
                                Swal.fire({
                                    text: 'unable to save blog. please try again later.',
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                });
                            },
                            500: function(request, status, error){
                                Swal.fire({
                                    text: 'unable to save blog. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            0: function(request, status, error){
                                Swal.fire({
                                    text: 'unable to save blog. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                    
                    e.preventDefault();
                });
            });

            function delete_record(){
                Swal.fire({
                    text: "Are you sure you want to delete: <?php echo $blog->title; ?>?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true
                }).then(function(result) {
                    if (result.value) {
                        // set user to delete
                        var settings = {
                            "url": "<?php echo site_url('blogs/delete'); ?>?id=<?php echo $blog->id; ?>",
                            "method": "DELETE"
                        };

                        var loading = new Loading();
                        $.ajax(settings).done(function (response) {
                            loading.out();
                            window.location.href = '<?php echo site_url('blogs'); ?>';
                        });
                    }
                });
            }
        </script>
    </body>
</html>