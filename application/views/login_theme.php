<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Salesman CRM</title>


    <link href="<?php echo base_url(); ?>matrix/themes/sbadmin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>matrix/themes/sbadmin/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>matrix/themes/sbadmin/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>matrix/themes/sbadmin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo lang('login_heading');?></h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open("auth/login");?>
							<p><?php echo lang('login_subheading');?></p>
                            <fieldset>
                                <div class="form-group">
                                    <?php echo form_input($identity);?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_input($password);?>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <?php echo form_submit('submit', lang('login_submit_btn'), "class='btn btn-lg btn-success btn-block'");?>
                            </fieldset>
                        <?php echo form_close();?>
                        <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>matrix/themes/sbadmin/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>matrix/themes/sbadmin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>matrix/themes/sbadmin/js/plugins/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>matrix/themes/sbadmin/js/sb-admin-2.js"></script>

</body>

</html>
