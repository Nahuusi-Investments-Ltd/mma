            <!-- order view -->
            <?php $this->load->view('backend/partials/header'); ?>
            <div class="c-subheader justify-content-between px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('slide'); ?>">Slides</a></li>
                    <li class="breadcrumb-item active"><?php echo $slide->title; ?></li>
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
                                        <h1>Edit Slide Form</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="slide-form" name="slide-form" method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $slide->id; ?>" />
                                    <input type="hidden" name="slide_link" value="<?php echo $slide->link; ?>" />
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#detail" role="tab" aria-controls="detail">
                                                Form Data
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#preview" role="tab" aria-controls="preview">
                                                Slide Preview
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
                                                        <input class="form-control" name="title" type="text" required="" value="<?php echo $slide->title; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- image -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="link" class="font-weight-bold">Slide Image <span class="text-muted font-weight-bold">(JPEG,PNG Only)</span></label>
                                                        <input class="form-control-file" name="link" type="file" accept=".jpg,.png" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description" class="font-weight-bold">Description<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="description" type="text" required="" value="<?php echo $slide->description; ?>" />
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
                var image_link = '<?php echo base_url('uploads/slides'); ?>/<?php echo $slide->link; ?>';
                PDFObject.embed(image_link, "#document-preview");

                $("form[name='slide-form']").submit(function(e) {
                    var formData = new FormData($(this)[0]);
                    var loading = new Loading();

                    $.ajax({
                        url: '<?php echo site_url('slide/save'); ?>',
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
                                    text: 'slide updated!',
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
                                    text: 'unable to save slide. please try again later.',
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
                                    text: 'unable to save slide. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            0: function(request, status, error){
                                Swal.fire({
                                    text: 'unable to save slide. please try again later.',
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
                    text: "Are you sure you want to delete: <?php echo $slide->title; ?>?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true
                }).then(function(result) {
                    if (result.value) {
                        // set user to delete
                        var settings = {
                            "url": "<?php echo site_url('slide/delete'); ?>?id=<?php echo $slide->id; ?>",
                            "method": "DELETE"
                        };

                        var loading = new Loading();
                        $.ajax(settings).done(function (response) {
                            loading.out();
                            window.location.href = '<?php echo site_url('slide'); ?>';
                        });
                    }
                });
            }
        </script>
    </body>
</html>