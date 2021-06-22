            <!-- order view -->
            <?php $this->load->view('backend/partials/header'); ?>
            <div class="c-subheader justify-content-between px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('testimony'); ?>">Testimonials</a></li>
                    <li class="breadcrumb-item active"><?php echo $testimony->name; ?></li>
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
                                        <h1>Edit Testimony Form</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="testimony-form" name="testimony-form" method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $testimony->id; ?>" />
                                    <input type="hidden" name="testimony_link" value="<?php echo $testimony->link; ?>" />
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#detail" role="tab" aria-controls="detail">
                                                Form Data
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#preview" role="tab" aria-controls="preview">
                                                Testimony Image Preview
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="detail" role="tabpanel">
                                            <br/>
                                            <!-- name/type of testimony -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Name<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="name" type="text" required="" value="<?php echo $testimony->name; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="testimony_type" class="font-weight-bold">Testimony Type<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="testimony_type" name="testimony_type" required="">
                                                            <option value=""></option>
                                                            <option value="text">Text</option>
                                                            <option value="photo">Photo</option>
                                                            <option value="video">Video</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- rating/columns -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="rating" class="font-weight-bold">Rating<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="rating" name="rating" required="">
                                                            <option value=""></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="columns" class="font-weight-bold">Column Count<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="columns" name="columns" required="">
                                                            <option value=""></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- image -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="link" class="font-weight-bold">Testimony Image/Video <span class="text-muted font-weight-bold">(JPEG,PNG,mp4 Only)</span></label>
                                                        <input class="form-control-file" name="link" type="file" accept=".jpg,.png,.mp4" />
                                                    </div>
                                                </div>
                                            </div>

                                            <br/>
                                            <!-- message -->
                                            <input type="hidden" name="message" id="content_message" />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div id="editor" style="height: 400px;"><?php echo $testimony->message; ?></div>
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
                $('#testimony_type').val('<?php echo $testimony->testimony_type; ?>');
                $('#rating').val('<?php echo $testimony->rating; ?>');
                $('#columns').val('<?php echo $testimony->columns; ?>');

                // quill editor
                quill = new Quill('#editor', {
                    modules: {
                        toolbar: quill_toolbar_options
                    },
                    theme: 'snow'
                });

                var image_link = '<?php echo base_url('uploads/testimony'); ?>/<?php echo $testimony->link; ?>';
                PDFObject.embed(image_link, "#document-preview");

                $("form[name='testimony-form']").submit(function(e) {
                    var html = quill.root.innerHTML;
                    $('#content_message').val(html);

                    var formData = new FormData($(this)[0]);
                    var loading = new Loading();

                    $.ajax({
                        url: '<?php echo site_url('testimony/save'); ?>',
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
                                    text: 'testimony updated!',
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
                                    text: 'unable to save testimony. please try again later.',
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
                                    text: 'unable to save testimony. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            0: function(request, status, error){
                                Swal.fire({
                                    text: 'unable to save testimony. please try again later.',
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
                    text: "Are you sure you want to delete: <?php echo $testimony->name; ?>?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true
                }).then(function(result) {
                    if (result.value) {
                        // set user to delete
                        var settings = {
                            "url": "<?php echo site_url('testimony/delete'); ?>?id=<?php echo $testimony->id; ?>",
                            "method": "DELETE"
                        };

                        var loading = new Loading();
                        $.ajax(settings).done(function (response) {
                            loading.out();
                            window.location.href = '<?php echo site_url('testimony'); ?>';
                        });
                    }
                });
            }
        </script>
    </body>
</html>