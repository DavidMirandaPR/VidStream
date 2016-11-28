$(document).ready(function(){
		$(".button-collapse").sideNav();
		$('select').material_select();
		$('ul.tabs').tabs();
});

//Usernames Handler
function editUser(value, valueID){
	var newUser = prompt("Edit " + value + " username");
	console.log(value, valueID, newUser);
	$.post('/editUser', {
		_token: $('meta[name=csrf-token]').attr('content'),
		changeUser: newUser,
		selectedUID: valueID
	}).done(function(msg){
		alert(msg);
		window.location = "http://vidstream.tv/profile";
	});
}
