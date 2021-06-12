            <!-- dashboard -->
            <?php $this->load->view('backend/partials/header'); ?>
            <div class="c-subheader justify-content-between px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item active"><strong>Team Members</strong></a></li>
                    <!-- Breadcrumb Menu-->
                </ol>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <!-- team members -->
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#list-tab" role="tab" aria-controls="list-tab">
                                            All Team Members
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#add-tab" role="tab" aria-controls="add-tab">
                                            Add New Member
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="list-tab" role="tabpanel">
                                        <br/>
                                        <div class="table-responsive">
                                            <table id="members" class="table table-separate table-head-custom table-checkable table-hover table-striped" width="100%">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th width="15%">Avatar</th>
                                                        <th>Name</th>
                                                        <th>Title</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="add-tab" role="tabpanel">
                                        <br/>
                                        <form id="member-form" name="member-form" method="post" action="" enctype="multipart/form-data">
                                            <!-- name -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Name of Member<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="name" type="text" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- title -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title" class="font-weight-bold">Title<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="title" type="text" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- email -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email" class="font-weight-bold">Email<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="email" type="email" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- phone -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="phone" class="font-weight-bold">Phone<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="phone" type="text" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- address -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address" class="font-weight-bold">Address<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="address" required="" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- photo -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="photo" class="font-weight-bold">Avatar <span class="text-muted font-weight-bold">(JPEG,PNG Only)</span><span class="text-danger">*</span></label>
                                                        <input class="form-control-file" name="photo" type="file" accept=".jpg,.png" required="" />
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
                                                        <div id="bio" style="height: 400px;"></div>
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
                                                        <div id="classes" style="height: 400px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <br/>
                                            <button class="btn btn-block btn-dark" type="submit"><strong>Save</strong></button>
                                            <br/>
                                        </form>
                                    </div>
                                </div>
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
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            var members_table = null;

            $(document).ready(function(){
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

                members_table = $('#members').DataTable({
                    ajax: {
                        url: '<?php echo site_url('team/list'); ?>',
                        dataSrc: "teams"
                    },
                    columns: [
                        {data: "photo"},
                        {data: "name"},
                        {data: "title"},
                        {data: "email"},
                        {data: "phone"},
                        {data: "address"},

                    ],
                    createdRow: function (row, data, dataIndex) {
                        $(row).attr('data-id', data.id);
                    },
                    pageLength: 100,
                    stateSave: true,
                });

                $('#members tbody').on('click', 'tr', function () {
                    window.location.href = window.location.href = '<?php echo site_url('team/detail'); ?>?id=' + $(this).data("id");
                });

                $("form[name='member-form']").submit(function(e) {
                    var html_bio = quill_bio.root.innerHTML;
                    $('#content_bio').val(html_bio);

                    var html_classes = quill_classes.root.innerHTML;
                    $('#content_classes').val(html_classes);

                    var formData = new FormData($(this)[0]);
                    var loading = new Loading();

                    $.ajax({
                        url: '<?php echo site_url('team/add'); ?>',
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
                            201: function(request, status, error){
                                Swal.fire({
                                    text: 'team member added successfully.',
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function(){
                                    $('#member-form').trigger("reset");
                                    $('#bio').html('');
                                    $('#classes').html('');

                                    members_table.ajax.reload();
                                });
                            },
                            400: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while team member. please try again later.',
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
                                    text: 'something went wrong while adding team member. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            0: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding team member. please try again later.',
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
        </script>
    </body>
</html>