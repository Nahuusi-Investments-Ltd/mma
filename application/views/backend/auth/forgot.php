<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="./" />
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="keyword" content="" />
        <title>Reset Password - <?php echo $_ENV['SITE_TITLE']; ?></title>
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png" />
        <meta name="theme-color" content="#ffffff" />
        <link href="<?php echo base_url('assets/backend/css/style.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/backend/css/sweetalert2.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/backend/css/modal-loading-animate.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/backend/css/modal-loading.css'); ?>" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png'); ?>" />
    </head>
    <body class="c-app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-group">
                        <div class="card p-4">
                            <div class="card-body">
                                <h1>Reset Password</h1>
                                <form id="reset-form" name="reset-form" method="post">
                                    <div class="form-group">
                                        <label for="email"><strong>E-mail address <span class="text-danger">*</span></strong></label>
                                        <input class="form-control" id="email" name="email" type="email" placeholder="Your e-mail address" required="" />
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-info text-white px-4" type="submit">Reset Password</button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="<?php echo site_url('login'); ?>" class="btn btn-link px-0 text-info" type="button"><strong>Back to login?</strong></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('assets/backend/js/jquery.min.js'); ?>"></script>

        <!-- coreUI and necessary plugins-->
        <script src="<?php echo base_url('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js'); ?>"></script>
        
        <!--[if IE]><!-->
        <script src="<?php echo base_url('node_modules/@coreui/icons/js/svgxuse.min.js'); ?>"></script>
        <!--<![endif]-->

        <script src="<?php echo base_url('assets/backend/js/modal-loading.js'); ?>"></script>
        <script src="<?php echo base_url('assets/backend/js/sweetalert2.min.js'); ?>"></script>

        <script type="text/javascript">
            $("form[name='reset-form']").submit(function(e) {
                var formData = new FormData($(this)[0]);
                var loading = new Loading();

                $.ajax({
                    url: '<?php echo site_url('login/reset'); ?>',
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        loading.out();

                        $('#reset-form').trigger("reset");
                    },
                    error: function(xhr, status, error) {
                        loading.out();
                    },
                    statusCode: {
                        204: function(request, status, error){
                            Swal.fire({
                                text: 'Password reset successful',
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            }).then(function(){
                                window.location.href = '<?php echo site_url('login'); ?>'
                            });
                        },
                        400: function(request, status, error){
                            Swal.fire({
                                text: 'We are unable to reset your password',
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            });
                        },
                        404: function(request, status, error){
                            Swal.fire({
                                text: 'No such account with the email address exists',
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
                                text: 'A technical error has occured, kindly send an email to support',
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                },
                                buttonsStyling: false
                            });
                        },
                        0: function(request, status, error){
                            Swal.fire({
                                text: 'A technical error has occured, kindly send an email to support',
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
        </script>
    </body>
</html>
