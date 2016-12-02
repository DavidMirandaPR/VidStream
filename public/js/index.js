$(document).ready(function(){
		$(".button-collapse").sideNav();
		$('select').material_select();
		$('ul.tabs').tabs();
		$('.carousel').carousel();
});

//Usernames Handler

//Edit User
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

//Delete User
function deleteUser(valueID){
	$.post('/deleteUser', {
		_token: $('meta[name=csrf-token]').attr('content'),
		selectedUID: valueID
	}).done(function(msg){
		alert(msg);
		window.location = "http://vidstream.tv/profile";
	});
}

function deleteGenre(value) {
	$.post('/deleteGenre', {
		_token: $('meta[name=csrf-token]').attr('content'),
		selectedGenre: value
	}).done(function(msg){
		alert(msg);
		window.location = "http://vidstream.tv/profile";
	});
}


function ticketHandler(valueID) {
	$.post('/ticketHandler', {
		_token: $('meta[name=csrf-token]').attr('content'),
		ticketID: valueID
	}).done(function(msg){
		alert("Y");
		window.location = "http://vidstream.tv/profile";
	});
}


function deleteAcc(valueID) {
	$.post('/deleteAccount', {
		_token: $('meta[name=csrf-token]').attr('content'),
		accountID: valueID
	}).done(function(msg){
		alert(msg);
		window.location = "http://vidstream.tv/profile";
	});
}
