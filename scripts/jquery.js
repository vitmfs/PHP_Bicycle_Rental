$(document).ready(function () {

	alert("jQuery ligado");

	/*
	$("sand").dblclick(function() {
		
		$("sand").fadeOut(1000);
		
	});
	*/

	
	
	$("#pesquisa").ready(function() {
		
		$("#pesquisa").slideToggle(1).slideToggle(3000);
		
	});
	
	$('button').mouseenter(function() {
		
		$(this).css({ transform: 'scale(1.1)' });
		
	});
	
	$('button').mouseleave(function() {
		
		$(this).css({ transform: 'scale(1.0)' });
		
	});
	
	$('ul').mouseenter(function() {
		
		$(this).css('backgroundColor', 'yellow');
		
	});
	
	$('ul').mouseleave(function() {
		
		$(this).css('backgroundColor', 'orange');
		
	});
	
	$("#fixed").dblclick(function() {
		
		$("#fixed").fadeOut(1000);
		
	});
	
	
	
	
	
	
	
	/*
	$('#botaoLogin').mouseenter(function() {
		
		$('#botaoLogin').css({ transform: 'scale(1.1)' });
		
	});
	
	$('#botaoLogin').mouseleave(function() {
		
		$('#botaoLogin').css({ transform: 'scale(1.0)' });
		
	});
	*/
	
	
	
	
	
	
	
	


});
