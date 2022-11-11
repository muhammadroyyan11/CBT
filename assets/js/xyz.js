/******************************************************************
	APLIKASI TRY OUT ONLINE
	WRITTEN and DEVELOPED by : Agi Nugraha
	HOME PAGE : www.jayvyn-host.com
	EMAIL ADDRESS : agi@jayvyn-host.com	
	COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
*******************************************************************/
var items = [];
function clickes(item) {
	var x = $(item).attr("id").substring(1);
	var v = '#b'+x;
	var w = '#e'+x;
	var u = v + ',' + w;
	$(u).addClass("active");
	items.push(x);
	var unique = items.filter(function(elem, pos) {
		return items.indexOf(elem) == pos;
	}); 
	var batas = dnum;
	if (unique.length==batas) {
		$("#beres").show();
	}
}
$(document).ready(function() {
	$("#beres").hide();
	$("section.hideme").hide();
	$('#section1').show();
	$("button.e").click(function() {
		var id = $(this).attr("id");		
		var sectionId = id.replace("e", "section");
		$("section.hideme").hide();
		$("section#" + sectionId).fadeIn("slow");
	});
});

function clicked(item) {
	var x = $(item).attr("id").substring(1);
	localStorage.setItem('y',x);
}	

function next() {
	if (localStorage.getItem("y") !== null)  {
		var i =  parseInt(localStorage.getItem('y'));
		var batas = dnum;
		if (i<batas){
			id = 'e'+(i+1);
			t = id.replace("e", "section");
			$("section.hideme").hide();
			$("section#" + t).fadeIn("slow");
			i = i + 1;
			localStorage.setItem('y',i);
		}
		} else {
		var i = 1;
		id = 'e'+(i+1);
		t = id.replace("e", "section");
		$("section.hideme").hide();
		$("section#" + t).fadeIn("slow");
		i = i + 1;
		localStorage.setItem('y',i);
	}
}

function prev() {
	var i =  parseInt(localStorage.getItem('y'));
	if (i>1) {
		id = 'e'+(i-1);
		t = id.replace("e", "section");
		$("section.hideme").hide();
		$("section#" + t).fadeIn("slow");
		i = i - 1;
		localStorage.setItem('y',i);
	}
}

var time_limit, current_time, hrs, mins, begin ;
if (localStorage.getItem("waktu") === null) {
	var wkt = document.getElementById("jam");
	time_limit = ((wkt.textContent)*60)-60;
	seconds = 59;
}
else{
	time_limit = localStorage.getItem("waktu");
	seconds = localStorage.getItem("dtk");;
	localStorage.clear();
}
var x=0;
begin = 0;
var time_consumed = 0;
//alert(time_limit);
$(document).ready(function(){
	//check result
	var myVar=setInterval(function(){
		if (time_limit > 0 || seconds > 0) {
			if (begin == 0){
				begin = 1;
				hrs = (time_limit - (time_limit % 3600)) / 3600;
				mins = (time_limit % 3600) / 60;	
			}
			time_limit --;
			seconds--;
			if (seconds == 0){
				hrs = (time_limit - (time_limit % 3600)) / 3600;
				mins = (time_limit % 3600) / 60;	
			}
			if (seconds == 0 && time_limit > 0){
				seconds = 59;
			}
			time_consumed++;
			$('#time').html('<div style="font-family: \'BebasNeueRegular\';font-size:16px;width:120px;background:#62794E;color:#fff;padding:5px;text-align:center;">WAKTU TERSISA<br/></div>' + (parseInt(hrs) > 0 ? parseInt(hrs) : '00') + ' : ' + (parseInt(mins) > 0 ? parseInt(mins) : '00') + ' : ' + (seconds > 0 ? seconds : '00'));
			jam = (parseInt(hrs) > 0 ? parseInt(hrs) : '00') * 3600;
			menit = (parseInt(mins) > 0 ? parseInt(mins) : '00') * 60;
			detik = (seconds > 0 ? seconds : '00');
			waktunya = jam + menit;
			localStorage.setItem('waktu', waktunya);
			localStorage.setItem('dtk', detik);				
			}else{
			//submit data
			alert("Waktunya sudah habis!");
			localStorage.clear();
			document.getElementById("kirim").submit();
		}
	},1000);
});			