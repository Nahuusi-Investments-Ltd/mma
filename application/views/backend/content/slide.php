            <!-- dashboard -->
            <?php $this->load->view('backend/partials/header'); ?>
            <div class="c-subheader justify-content-between px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item active"><strong>Slides on Home Page</strong></a></li>
                    <!-- Breadcrumb Menu-->
                </ol>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <!-- slides -->
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#slides-list" role="tab" aria-controls="slides-list">
                                            All Slides
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#add-slide" role="tab" aria-controls="add-slide">
                                            Add New Slide
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="slides-list" role="tabpanel">
                                        <br/>
                                        <div class="table-responsive">
                                            <table id="slides" class="table table-separate table-head-custom table-checkable table-hover table-striped" width="100%">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th width="30%">Image</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="add-slide" role="tabpanel">
                                        <br/>
                                        <form id="slide-form" name="slide-form" method="post" action="" enctype="multipart/form-data">
                                            <!-- title -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title" class="font-weight-bold">Title<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="title" type="text" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description" class="font-weight-bold">Description<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="description" type="text" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- image -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="link" class="font-weight-bold">Slide Image <span class="text-muted font-weight-bold">(JPEG,PNG Only)</span><span class="text-danger">*</span></label>
                                                        <input class="form-control-file" name="link" type="file" accept=".jpg,.png" required="" />
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
            var slides_table = null;

            $(document).ready(function(){
                slides_table = $('#slides').DataTable({
                    ajax: {
                        url: '<?php echo site_url('slide/list'); ?>',
                        dataSrc: "slides"
                    },
                    columns: [
                        {data: "title"},
                        {data: "description"},
                        {data: "link"}

                    ],
                    createdRow: function (row, data, dataIndex) {
                        $(row).attr('data-id', data.id);
                    },
                    pageLength: 100,
                    stateSave: true,
                });

                $('#slides tbody').on('click', 'tr', function () {
                    window.location.href = window.location.href = '<?php echo site_url('slide/detail'); ?>?id=' + $(this).data("id");
                });

                $("form[name='slide-form']").submit(function(e) {
                    var formData = new FormData($(this)[0]);
                    var loading = new Loading();

                    $.ajax({
                        url: '<?php echo site_url('slide/add'); ?>',
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
                                    text: 'slide added successfully.',
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function(){
                                    $('#slide-form').trigger("reset");
                                    $('#editor').html('');

                                    slides_table.ajax.reload();
                                });
                            },
                            400: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding slide. please try again later.',
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
                                    text: 'something went wrong while adding slide. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            0: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding slide. please try again later.',
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