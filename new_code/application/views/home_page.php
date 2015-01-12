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
	<body name=<?php echo '"'.$nume.'"'?> id=<?php echo '"'.$type1.'"'?>>
		<div class = "fullscreen">
			<div class = "fullscreen" >
				<div class = "modal-content fullscreen" >
					<div class = "modal-header">
						<h4  align="center">Bun venit, <?php echo $nume.'!';if($type == 'u') echo ' Sunteti logat ca utilizator'; else echo ' Sunteti logat ca administrator'?>!</h4>
						<h4 align="center">Listă utilizatori</h4>
						<?php if($type1 == 'a') echo'<input class = "form-control forms" type = "text" name = "usersearch" placeholder = "Cautare utilizator"> <select id = "order" class="form-control forms"><option value="asc">ASC</option><option  value="desc">DESC</option></select> <select id = "us_types" class="form-control forms"><option value="all">Toti</option><option value = "u">Utilizatori</option><option value = "a">Admini</option></select> '?>
					</div>
					<div class = "modal-body overflow" id = 'user-list'>
						<?php foreach($users as $data) {echo '<div style = "text-align: left;" class = "btn btn-info big namepopover" data-pop="true" data-html=true data-content="'.'Email: '.array_shift($email).'<br> Număr telefon: '.array_shift($phone).'<br> Categorie varsta: '.array_shift($age).' ani<br>Descriere: '.array_shift($description); if(array_shift($type) == 'u') echo '<br>Tipul: utilizator';else echo '<br>Tipul: administrator';echo '">'.$data.'<a href = "#edituser" onclick = "edit(this)" id = "'.$data.'" data-toggle = "modal" class = "btn btn-primary pull-right" title = "Editare"></a></div><br><br>';} ?>
						<br><br><br><br>
					</div>
					<div class = "modal-footer">
						 <?php if($type1 == 'a') echo '<a href="#adduser" class = "btn btn-default" data-toggle = "modal">Adăugare utilizator</a>' ?>
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
						<form id = "add">
							<p>Toate datele de mai jos sunt obligatorii!</p>
							<label for = "exampleInputusername">Nume utilizator</label><br>
							<input class = "form-control" type = "text" placeholder = "utilizator" name = "useradd" required>
							<label for = "exampleInputusername">Număr de telefon</label><br>
							<input class = "form-control" type = "tel" placeholder = "telefon" name = "teladd" required>
							<label for = "exampleInputusername">Email</label><br>
							<input class = "form-control" type = "email" placeholder = "email" name = "emailadd" required>
							<label for = "exampleInputusername">Password</label><br>
							<input class = "form-control" type = "password" placeholder = "parola" name = "passwordadd" required >
							<label for = "exampleInputusername">Descriere</label><br>
							<textarea name = "descriptionadd" rows="2" cols="50" class = "form-control" ></textarea><br>
							<select id = 'typeadd'>
								<option value="u">Utilizator</option>
								<option value="a">Administrator</option>
							</select><br><br>
							<a href = "#age_category"   class = "btn btn-default get_category" data-toggle = "modal" >Categorie vârstă</a><br><br>
							<input type = "submit" class = "btn btn-info"  value = "Înregistrare utilizator" ><br><br>
							<p id = "erroradd"></p>
						</form>
					</div>
					<div class = "modal-footer">
						
						<a class = "btn btn-primary" data-dismiss = "modal">Inchide</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class = "modal fade modal" id="edituser" role="dialog">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<h4 id = "mod"></h4>
					</div>
					<div class = "modal-body">
						<form id="editUSERS">
							<label for = "exampleInputusername">Număr de telefon</label><br>
							<input class = "form-control" type = "tel" placeholder = "telefon" name = "teledit">
							<label for = "exampleInputusername">Email</label><br>
							<input class = "form-control" type = "email" placeholder = "email" name = "emailedit">
							<label for = "exampleInputusername">Password</label><br>
							<input class = "form-control" type = "password" placeholder = "parola" name = "passwordedit" ><br>
							<?php if($type1 == 'a') echo '<select id = "typeedit"><option value="u">Utilizator</option><option value="a">Administrator</option></select><br><br>'?>
							<textarea class = "form-control" name = "descriptionedit" rows="2" cols="50"></textarea><br><br>
							<a href = "#age_category" class = "btn btn-default get_category" data-toggle = "modal" >Categorie vârstă</a><br><br>
							<input type = "submit" class = "btn btn-info" value = "Modificare date" ><br><br>
							<p id = "erroradd1"></p>
						</form>
					</div>
					<div class = "modal-footer">
						<button class = "btn btn-primary pull-left" id = 'delete_user' >Sterge utilizatorul</button>
						<a class = "btn btn-primary" data-dismiss = "modal">Inchide</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class = "modal fade modal" id="age_category" role="dialog">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<h4>Categorii de vârstă</h4>
					</div>
					<div class = "modal-body " >
						<div id = "ages_div"> 
							<?php foreach($ages as $age) echo '<input type="radio" name = "age_category_radio" value="'.$age.'"> '.$age.' ani   <button class = "btn btn-default" onclick="delete_age(this.name)" name="'.$age.'">X</button><br>'?>
						</div>
						<br>
						<a  class = "btn btn-default" data-toggle = "modal" id = "add_age_category" >Adauga categorie</a><br>
						<input class = 'add_agecat form-control' type = 'text' placeholder = "Categorie de varsta" name="cat_ani" id ="add_agecatin">
						<button class = "btn btn-default add_agecat" id ="add_agecat">Adaugare</button>
					</div>
					<div class = "modal-footer">
						<a  class = "btn btn-default pull-left" data-toggle = "modal" id = "add_age_category1" >OK</a><br>
						<a  class = "btn btn-primary" data-dismiss = "modal">Inchide</a>
					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.10.2.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/java.js"); ?>"></script>
	</body>
</html>