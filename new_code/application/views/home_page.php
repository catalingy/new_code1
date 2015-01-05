<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title;?></title>
		<link rel="stylesheet" href = "<?php echo base_url("assets/css/bootstrap.css"); ?>" />
		<link rel="stylesheet" href = "<?php echo base_url("assets/css/style.css"); ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		</style>
	</head>
	<body>
		<div class = "fullscreen">
			<div class = "fullscreen" >
				<div class = "modal-content fullscreen" >
					<div class = "modal-header">
						<h4>Bun venit, <?php echo $nume.'!';if($type == 'u') echo ' Sunteti logat ca utilizator'; else echo ' Sunteti logat ca administrator'?>!</h4>
					</div>
					<div class = "modal-body overflow">
						<?php foreach($users as $data) echo '<button class = "btn btn-info big" data-popover="true" data-html=true data-content="">'.$data.'</button>' ?>
					</div>
					<div class = "modal-footer">
						<a href="#adduser" class = "btn btn-default" data-toggle = "modal">Adăugare utilizator</a>
						<a href="login" class = "btn btn-primary" >Delogare</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class = "modal fade modal" id="adduser" role="dialog">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<h4>Adăugare utilizaor</h4>
					</div>
					<div class = "modal-body">
						<form action = "<?php base_url();?>reset_pass" method = "post">
							<p>Toate datele de mai jos sunt obligatorii!</p>
							<label for = "exampleInputusername">Nume utilizator</label><br>
							<input type = "text" placeholder = "utilizator" name = "user" required ><br><br>
							<label for = "exampleInputusername">Număr de telefon</label><br>
							<input type = "tel" placeholder = "telefon" name = "tel" required ><br><br>
							<label for = "exampleInputusername">Email</label><br>
							<input type = "email" placeholder = "email" name = "email" required ><br><br>
							<label for = "exampleInputusername">Password</label><br>
							<input type = "password" placeholder = "parola" name = "password" required ><br><br>
							<input type="radio" name="type" value="user">Utilizator<br>
							<input type="radio" name="type" value="admin">Administrator<br><br>
							<input type = "submit" class = "btn btn-primary" value = "Înregistrare utilizator" >
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
		<script type="text/javascript" src="<?php echo base_url("assets/js/java.js"); ?>"></script>
	</body>
</html>