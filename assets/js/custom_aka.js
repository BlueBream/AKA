$("document").ready(function(){
	$(".isi_nilai").click(function(e){
		e.preventDefault();
	});
	$(".cancel_nilai").click(function(e){
		e.preventDefault();
	});
	$(".isi_nilai").click(function(){

		$(".huruftampil").hide();
		$(".hurufform").show();
		$(".startnilai").hide();
		$(".cancelnilai").show();
		$(".savenilai").show();
	});
	$(".cancel_nilai").click(function(){

		$(".huruftampil").show();
		$(".hurufform").hide();
		$(".startnilai").show();
		$(".cancelnilai").hide();
		$(".savenilai").hide();
	});










});