<!DOCTYPE html>
<html lang="en">
<style>
.loader {
	border: 10px solid #f3f3f3; /* Light grey */
	border-top: 8px solid #3498db; /* Blue */
	border-right: 8px solid green;
	border-bottom: 8px solid red;
	border-left: 8px solid yellow;
	border-radius: 50%;
	width: 50px;
	height: 50px;
	animation: spin 2s linear infinite;
	margin:auto;
}

@keyframes spin {
	0% { transform: rotate(0deg); }
	100% { transform: rotate(360deg); }
}
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/ico" href="<?php echo base_url() ?>assets/images/iconindosat.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>.:Login Page</title>
	<link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
						<h4>Login</h4>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input name=" ?>" value="" id="user" class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input name="" value="" id="pass" class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" id="remember" type="checkbox">Remember me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button href="" type="submit" id="blogin" class="btn btn-lg btn-primary btn-block">Login</button>
								<div id="info"></div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
<script>

var loading = "<div class='loader'></div>";
function terus(){
	$("#info").html(loading);	
	$.post("<?php echo base_url("login/cek_login") ?>",{username:$("#user").val(),password:$("#pass").val()},function(output){
	  if(output == 1) location.href = "home";
	  else $("#info").html(output);
	});
	return false;
}

$("#blogin").click(terus);
// $("form input").keypress(function(e){if (e.which == 13){terus();}});
</script>
</html>

