            <!-- dashboard -->
            <?php $this->load->view('backend/partials/header'); ?>
            <div class="c-subheader justify-content-between px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item active"><strong>FAQs</strong></a></li>
                    <!-- Breadcrumb Menu-->
                </ol>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <!-- faqs -->
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#lists-tab" role="tab" aria-controls="lists-tab">
                                            All FAQs
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#add-tab" role="tab" aria-controls="add-tab">
                                            Add New FAQ
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="lists-tab" role="tabpanel">
                                        <br/>
                                        <div class="table-responsive">
                                            <table id="faqs" class="table table-separate table-head-custom table-checkable table-hover table-striped" width="100%">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th width="35%">Title</th>
                                                        <th>Message</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="add-tab" role="tabpanel">
                                        <br/>
                                        <form id="faq-form" name="faq-form" method="post" action="">
                                            <!-- title -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title" class="font-weight-bold">Title<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="title" type="text" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- message -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="message" class="font-weight-bold">Message<span class="text-danger">*</span></label>
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
            var faqs_table = null;

            $(document).ready(function(){
                faqs_table = $('#faqs').DataTable({
                    ajax: {
                        url: '<?php echo site_url('faq/list'); ?>',
                        dataSrc: "faqs"
                    },
                    columns: [
                        {data: "title"},
                        {data: "message"}

                    ],
                    createdRow: function (row, data, dataIndex) {
                        $(row).attr('data-id', data.id);
                    },
                    pageLength: 100,
                    stateSave: true,
                });

                $('#faqs tbody').on('click', 'tr', function () {
                    window.location.href = window.location.href = '<?php echo site_url('faq/detail'); ?>?id=' + $(this).data("id");
                });

                $("form[name='faq-form']").submit(function(e) {
                    var formData = new FormData($(this)[0]);
                    var loading = new Loading();

                    $.ajax({
                        url: '<?php echo site_url('faq/add'); ?>',
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
                                    text: 'faq added successfully.',
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function(){
                                    $('#faq-form').trigger("reset");

                                    faqs_table.ajax.reload();
                                });
                            },
                            400: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding faq. please try again later.',
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
                                    text: 'something went wrong while adding faq. please try again later.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            0: function(request, status, error){
                                Swal.fire({
                                    text: 'something went wrong while adding faq. please try again later.',
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