            <!-- dashboard -->
            <?php $this->load->view('backend/partials/header'); ?>
            <div class="c-subheader justify-content-between px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item active"><strong>Testimonials</strong></a></li>
                    <!-- Breadcrumb Menu-->
                </ol>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <!-- blogs -->
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#list-tab" role="tab" aria-controls="list-tab">
                                            All Testimonials
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#add-tab" role="tab" aria-controls="add-tab">
                                            Add New Testimony
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="list-tab" role="tabpanel">
                                        <br/>
                                        <div class="table-responsive">
                                            <table id="testimonies" class="table table-separate table-head-custom table-checkable table-hover table-striped" width="100%">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Message</th>
                                                        <th>Rating</th>
                                                        <th>Columns Count</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="add-tab" role="tabpanel">
                                        <br/>
                                        <form id="testimony-form" name="testimony-form" method="post" action="" enctype="multipart/form-data">
                                            <!-- name/type of testimony -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Name<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="name" type="text" required="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="testimony_type" class="font-weight-bold">Testimony Type<span class="text-danger">*</span></label>
                                                        <select class="form-control" name="testimony_type" required="">
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
                                                        <select class="form-control" name="rating" required="">
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
                                                        <select class="form-control" name="columns" required="">
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
                                                        <label for="link" class="font-weight-bold">Testimony Image/Video <span class="text-muted font-weight-bold">(JPEG,PNG,mp4 Only)</span><span class="text-danger">*</span></label>
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
                                                        <div id="editor" style="height: 400px;"></div>
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
                // quill editor
                var quill = new Quill('#editor', {
                    modules: {
                        toolbar: quill_toolbar_options
                    },
                    theme: 'snow'
                });

                testimonies_table = $('#testimonies').DataTable({
                    ajax: {
                        url: '<?php echo site_url('testimony/list'); ?>',
                        dataSrc: "testimonies"
                    },
                    columns: [
                        {data: "name"},
                        {data: "message"},
                        {data: "rating"},
                        {data: "columns"}

                    ],
                    createdRow: function (row, data, dataIndex) {
                        $(row).attr('data-id', data.id);
                    },
                    pageLength: 100,
                    stateSave: true,
                });

                $('#testimonies tbody').on('click', 'tr', function () {
                    window.location.href = window.location.href = '<?php echo site_url('testimony/detail'); ?>?id=' + $(this).data("id");
                });

                $("form[name='testimony-form']").submit(function(e) {
                    var html = quill.root.innerHTML;
                    $('#content_message').val(html);
                    
                    var formData = new FormData($(this)[0]);
                    var loading = new Loading();

                    $.ajax({
                        url: '<?php echo site_url('testimony/add'); ?>',
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
                                    text: 'testimony added successfully.',
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function(){
                                    $('#testimony-form').trigger("reset");
                                    $('#editor').html('');

                                    testimonies_table.ajax.reload();
                                });
                            },
                            400: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding testimony. please try again later.',
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
                                    text: 'something went wrong while adding testimony. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            0: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding testimony. please try again later.',
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