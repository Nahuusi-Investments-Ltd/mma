            <!-- dashboard -->
            <?php $this->load->view('backend/partials/header'); ?>
            <div class="c-subheader justify-content-between px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item active"><strong>Categories on Home Page</strong></a></li>
                    <!-- Breadcrumb Menu-->
                </ol>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <!-- categories -->
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#categories-list" role="tab" aria-controls="categories-list">
                                            All Categories
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#add-category" role="tab" aria-controls="add-category">
                                            Add New Category
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="categories-list" role="tabpanel">
                                        <br/>
                                        <div class="table-responsive">
                                            <table id="categories" class="table table-separate table-head-custom table-checkable table-hover table-striped" width="100%">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Image</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="add-category" role="tabpanel">
                                        <br/>
                                        <form id="category-form" name="category-form" method="post" action="" enctype="multipart/form-data">
                                            <!-- title -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title" class="font-weight-bold">Title<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="title" type="text" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- image -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="link" class="font-weight-bold">Category Image <span class="text-muted font-weight-bold">(JPEG,PNG Only)</span><span class="text-danger">*</span></label>
                                                        <input class="form-control-file" name="link" type="file" accept=".jpg,.png" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <br/>
                                            <!-- description -->
                                            <input type="hidden" name="description" id="content_description" />
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
            var categories_table = null;

            $(document).ready(function(){
                // quill editor
                var quill = new Quill('#editor', {
                    modules: {
                        toolbar: quill_toolbar_options
                    },
                    theme: 'snow'
                });

                categories_table = $('#categories').DataTable({
                    ajax: {
                        url: '<?php echo site_url('admin/get_categories'); ?>',
                        dataSrc: "categories"
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

                $('#categories tbody').on('click', 'tr', function () {
                    window.location.href = window.location.href = '<?php echo site_url('admin/category/detail'); ?>?id=' + $(this).data("id");
                });

                $("form[name='category-form']").submit(function(e) {
                    var html = quill.root.innerHTML;
                    $('#content_description').val(html);
                    
                    var formData = new FormData($(this)[0]);
                    var loading = new Loading();

                    $.ajax({
                        url: '<?php echo site_url('admin/add_category'); ?>',
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
                                    text: 'category added successfully.',
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function(){
                                    $('#category-form').trigger("reset");
                                    $('#editor').html('');

                                    categories_table.ajax.reload();
                                });
                            },
                            400: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding category. please try again later.',
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
                                    text: 'something went wrong while adding category. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            0: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding category. please try again later.',
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