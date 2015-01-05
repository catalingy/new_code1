<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title;?></title>
		<link rel="stylesheet" href = "<?php echo base_url("assets/css/bootstrap.css"); ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		</style>
	</head>
	<body>
		<div class = "navbar navbar-inverse navbar-static-top">
				<a class = "navbar-brand" href = "login">First site</a>				
		</div>
		
		<div class = "col-md-4" ></div>
		
		<div class = "col-md-4"> 
			<div class = "well">	
				<?php echo form_open('site01/validation');?>
					<fieldset>
						<legend>Logare pe site</legend>
						<label for = "exampleInputusername">Nume utilizator</label><br>
						<input type = "text" placeholder = "utilizator" name = "user"  ><br><br>
						<label for = "exampleInputpassword">Parola</label><br>
						<input type = "password" placeholder = "parola" name = "password" ><br><br>
						<input type = "submit" class = "btn btn-primary" value = "Logare" >
						<a href="#recparola" data-toggle = "modal">Am uitat parola</a><br><br>
						<p><?php echo validation_errors(); ?></p>
					</fieldset>
				</form>
			</div>
		</div>
		
		<div class = "modal fade modal" id="recparola" role="dialog">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<h4>Recupereaza parola</h4>
					</div>
					<div class = "modal-body">
						<form action = "<?php base_url();?>reset_pass" method = "post">
							<p>Introdu email si user si iti vom trimite o parola noua pe email!</p>
							<label for = "exampleInputusername">Nume utilizator</label><br>
							<input type = "text" placeholder = "utilizator" name = "userrec" required ><br><br>
							<label for = "exampleInputusername">Email</label><br>
							<input type = "email" placeholder = "email" name = "emailrec" required ><br><br>
							<input type = "submit" class = "btn btn-primary" value = "Trimite parola noua" >
						</form>
					</div>
					<div class = "modal-footer">
						<a class = "btn btn-primary" data-dismiss = "modal">Inchide</a>
					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.10.2.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	</body>
</html>