$('.get_category').attr('name','-');
$('.namepopover').popover({
        trigger:'hover',
        animation: false,
        placement: 'bottom' 
    });

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}
$('body').popover({ selector: '[data-popover]', trigger: 'click hover', placement: 'auto', delay: {show: 50, hide: 400}});

$('#add').submit(function(event) {
			event.preventDefault();
			$("p[id='erroradd']").text("");
			if(($("input[name='useradd']").val() != "") && ($("input[name='teladd']").val()!= "") && ($("input[name='emailadd']").val()!= "") && ($("input[name='passwordadd]").val()!= "") && ($('#typeadd').val()  != "")){
					$.post( "add", { useradd: $("input[name='useradd']").val(),teladd: $("input[name='teladd']").val(),emailadd: $("input[name='emailadd']").val(),passwordadd: $("input[name='passwordadd']").val(),typeadd: $('#typeadd').val(),descriptionadd :  $("textarea[name='descriptionadd']").val(), age: $('.get_category').attr('name') })
					 .done(function( data ) {
								if( data == 2){
										$("p[id='erroradd']").text("Acest nume de utilizator exista deja in baza noastra de date!");
								}		
								if( data == 3){								
									$("p[id='erroradd']").text("Contactul a fost introdus cu succes!");
									document.getElementById("add").reset();
									setTimeout(function(){$('#adduser').modal('toggle');$('.get_category').attr('name','-');$("p[id='erroradd']").text("");}, 2500);
									$.post("reload",{nume: $('body').attr('name'), type: $('body').attr('id')}).done(function( data ){
										$('#user-list').html(data);
										$('.namepopover').popover({
											trigger:'hover',
											animation: false,
											placement: 'bottom' 
										});
									});
								}
					});
					
			}
});
$('#editUSERS').submit(function(event) {
					event.preventDefault();
					$("p[id='erroradd1']").text("");
					$.post( "edit", { useredit: $('#edituser').attr('name'),teledit: $("input[name='teledit']").val(),emailedit: $("input[name='emailedit']").val(),passwordedit: $("input[name='passwordedit']").val(),typeedit: $('#typeedit').val(), descriptionedit: $("textarea[name='descriptionedit']").val(), age: $('.get_category').attr('name') })
					 .done(function( data ) {
									$("p[id='erroradd1']").text(data);							
									setTimeout(function(){$('#edituser').modal('toggle');$('.get_category').attr('name','0');$("p[id='erroradd1']").text("");}, 2500);
									document.getElementById("editUSERS").reset();
									$.post("reload",{nume: $('body').attr('name'), type: $('body').attr('id')}).done(function( data ){
										$('#user-list').html(data);
										$('.namepopover').popover({
											trigger:'hover',
											animation: false,
											placement: 'bottom' 
										});
									});
					});
			
});
function edit(button){
		$('#edituser').attr('name',button.id);
		$('#mod').text("Modificati datele utilizatorului: "+ $('#edituser').attr('name'));
			
}
$("#add_age_category").click(function() {
	$('#add_agecat').attr('class','btn btn-default add_agecatin');
	$('#add_agecatin').attr('class',' add_agecatin');
});
$("#add_agecat").click(function() {
	$.post( "add_age", { agecat: $('#add_agecatin').val() })
				.done(function( data ) {
							$("p[id='erroradd1']").text(data);							
							$.post("reload_ages").done(function( data ){
								$('#ages_div').html(data);
							});
					});
	$('#add_agecat').attr('class','btn btn-default add_agecat');
	$('#add_agecatin').attr('class',' add_agecat');
	$('#add_agecatin').val('');
});
function delete_age(x) {
	$.post( "delete_age", { agecat: x })
				.done(function( data ) {
							$("p[id='erroradd1']").text(data);							
							$.post("reload_ages").done(function( data ){
								$('#ages_div').html(data);
							});
							$.post("reload",{nume: $('body').attr('name'), type: $('body').attr('id'), search: $("input[name='usersearch']").val()}).done(function( data ){
										$('#user-list').html(data);
										$('.namepopover').popover({
											trigger:'hover',
											animation: false,
											placement: 'bottom' 
										});
							});
					});
}
$("#add_age_category1").click(function() {
	$.post("reload",{nume: $('body').attr('name'), type: $('body').attr('id')}).done(function( data ){
										$('#user-list').html(data);
										$('.namepopover').popover({
											trigger:'hover',
											animation: false,
											placement: 'bottom' 
										});
	});
	$('.get_category').attr('name',$("input[name='age_category_radio']:radio:checked").val());
	$('#age_category').modal('toggle');	
});
$("input[name='usersearch']").on("input propertychange",function() {
		$.post("reload",{nume: $('body').attr('name'), type: $('body').attr('id'), search: $("input[name='usersearch']").val()}).done(function( data ){
										$('#user-list').html(data);
										$('.namepopover').popover({
											trigger:'hover',
											animation: false,
											placement: 'bottom' 
										});
									});
									
										
});
$("#delete_user").click(function(){
			if(confirm("Esti sigur ca vrei sa stergi utilizatorul: " + $('#edituser').attr('name')+'?')){
				$("p[id='erroradd1']").text("");
				$.post("delete_user", {name: $('#edituser').attr('name')}).done(function( data ) {
								$("p[id='erroradd1']").text(data);							
								setTimeout(function(){$('#edituser').modal('toggle');$('.get_category').attr('name','-');$("p[id='erroradd1']").text("");}, 2500);
								$.post("reload",{nume: $('body').attr('name'), type: $('body').attr('id')}).done(function( data ){
									$('#user-list').html(data);
									$('.namepopover').popover({
										trigger:'hover',
										animation: false,
										placement: 'bottom' 
									});
								});
				});
			}
});