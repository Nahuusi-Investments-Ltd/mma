            <!-- order view -->
            <?php $this->load->view('backend/partials/header'); ?>
            <div class="c-subheader justify-content-between px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/team'); ?>">Team Members</a></li>
                    <li class="breadcrumb-item active"><?php echo $member->name; ?></li>
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
                                        <h1>Edit Team Member Form</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="member-form" name="member-form" method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $member->id; ?>" />
                                    <input type="hidden" name="team_photo" value="<?php echo $member->photo; ?>" />
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#detail" role="tab" aria-controls="detail">
                                                Form Data
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#preview" role="tab" aria-controls="preview">
                                                Avatar Preview
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="detail" role="tabpanel">
                                            <br/>
                                            <!-- name -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Member Name<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="name" type="text" required="" value="<?php echo $member->name; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- title -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title" class="font-weight-bold">Title<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="title" type="text" required="" value="<?php echo $member->title; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- email -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email" class="font-weight-bold">Email<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="email" type="email" required="" value="<?php echo $member->email; ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- phone -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="phone" class="font-weight-bold">Phone<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="phone" type="text" required="" value="<?php echo $member->phone; ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- address -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address" class="font-weight-bold">Address<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="address" required="" rows="5"><?php echo $member->address; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- image -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="photo" class="font-weight-bold">Avatar <span class="text-muted font-weight-bold">(JPEG,PNG Only)</span></label>
                                                        <input class="form-control-file" name="photo" type="file" accept=".jpg,.png" />
                                                    </div>
                                                </div>
                                            </div>

                                            <br/>
                                            <!-- bio -->
                                            <input type="hidden" name="bio" id="content_bio" />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="bio" class="font-weight-bold">Member BIO<span class="text-danger">*</span></label>
                                                        <div id="bio" style="height: 400px;"><?php echo $member->bio; ?></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <br/>
                                            <!-- classes -->
                                            <input type="hidden" name="classes" id="content_classes" />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="classes" class="font-weight-bold">Member Classes<span class="text-danger">*</span></label>
                                                        <div id="classes" style="height: 400px;"><?php echo $member->classes; ?></div>
                                                    </div>
                                                </div>
                                            </div>

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
                var image_link = '<?php echo base_url('uploads/team'); ?>/<?php echo $member->photo; ?>';
                PDFObject.embed(image_link, "#document-preview");

                // quill bio
                var quill_bio = new Quill('#bio', {
                    modules: {
                        toolbar: quill_toolbar_options
                    },
                    theme: 'snow'
                });

                // quill classes
                var quill_classes = new Quill('#classes', {
                    modules: {
                        toolbar: quill_toolbar_options
                    },
                    theme: 'snow'
                });

                $("form[name='member-form']").submit(function(e) {
                    var html_bio = quill_bio.root.innerHTML;
                    $('#content_bio').val(html_bio);

                    var html_classes = quill_classes.root.innerHTML;
                    $('#content_classes').val(html_classes);
                    
                    var formData = new FormData($(this)[0]);
                    var loading = new Loading();

                    $.ajax({
                        url: '<?php echo site_url('team/save'); ?>',
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
                                    text: 'team member updated!',
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
                                    text: 'unable to save team member. please try again later.',
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
                                    text: 'unable to save team member. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            0: function(request, status, error){
                                Swal.fire({
                                    text: 'unable to save team member. please try again later.',
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
                    text: "Are you sure you want to delete: <?php echo $member->name; ?>?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true
                }).then(function(result) {
                    if (result.value) {
                        // set user to delete
                        var settings = {
                            "url": "<?php echo site_url('team/delete'); ?>?id=<?php echo $member->id; ?>",
                            "method": "DELETE"
                        };

                        var loading = new Loading();
                        $.ajax(settings).done(function (response) {
                            loading.out();
                            window.location.href = '<?php echo site_url('admin/team'); ?>';
                        });
                    }
                });
            }
        </script>
    </body>
</html>