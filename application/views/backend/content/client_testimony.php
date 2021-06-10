            <!-- dashboard -->
            <?php $this->load->view('backend/partials/header'); ?>
            <div class="c-subheader justify-content-between px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item active"><strong>Clients Testimonies</strong></a></li>
                    <!-- Breadcrumb Menu-->
                </ol>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <!-- testimonies -->
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#testimonies-list" role="tab" aria-controls="testimonies-list">
                                            All Clients Testimonies
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#add-testimony" role="tab" aria-controls="add-testimony">
                                            Add New Testimony
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="testimonies-list" role="tabpanel">
                                        <br/>
                                        <div class="table-responsive">
                                            <table id="testimonies" class="table table-separate table-head-custom table-checkable table-hover table-striped" width="100%">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th width="10%">Avatar</th>
                                                        <th width="30%">Client Name</th>
                                                        <th>Message</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="add-testimony" role="tabpanel">
                                        <br/>
                                        <form id="testimony-form" name="testimony-form" method="post" action="" enctype="multipart/form-data">
                                            <!-- name -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Client Name<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="name" type="text" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- image -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="link" class="font-weight-bold">Client Avatar <span class="text-muted font-weight-bold">(JPEG,PNG Only)</span><span class="text-danger">*</span></label>
                                                        <input class="form-control-file" name="link" type="file" accept=".jpg,.png" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- nessage -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Client Message<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="message" rows="5" required=""></textarea>
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
            var testimonies_table = null;

            $(document).ready(function(){
                testimonies_table = $('#testimonies').DataTable({
                    ajax: {
                        url: '<?php echo site_url('feedback/list'); ?>',
                        dataSrc: "testimonies"
                    },
                    columns: [
                        {data: "link"},
                        {data: "name"},
                        {data: "message"}
                    ],
                    createdRow: function (row, data, dataIndex) {
                        $(row).attr('data-id', data.id);
                    },
                    pageLength: 100,
                    stateSave: true,
                });

                $('#testimonies tbody').on('click', 'tr', function () {
                    window.location.href = window.location.href = '<?php echo site_url('feedback/detail'); ?>?id=' + $(this).data("id");
                });

                $("form[name='testimony-form']").submit(function(e) {
                    var formData = new FormData($(this)[0]);
                    var loading = new Loading();

                    $.ajax({
                        url: '<?php echo site_url('feedback/add'); ?>',
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
                                    text: 'client testimony added successfully.',
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function(){
                                    $('#testimony-form').trigger("reset");

                                    testimonies_table.ajax.reload();
                                });
                            },
                            400: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding client testimony. please try again later.',
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
                                    text: 'something went wrong while adding client testimony. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            0: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding client testimony. please try again later.',
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