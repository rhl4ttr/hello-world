$(document).ready(function(){
	$(window).bind('hashchange', function(){
		loadAjax();
	});
	loadAjax();
});
 
function loadAjax(){	
	
	if(! window.location.hash){
		return;
	}

	if(window.top!==window.self){
		window.top.location.hash = window.location.hash;		
		return;	
	}
	
	var url = window.location.hash.replace('#', '');

	var iframe = $("#contentFrame");
	iframe.attr("src", url);
	
	iframe.load(function() {
	    this.style.height =
	    this.contentWindow.document.body.offsetHeight + 'px';
	});

	
}


function collectformdata(){
	var dataurl = $("form").serialize();
	var finalurl = window.location.href.replace("#/", "")+"/&"+dataurl;	
	alert(finalurl);
	 
}

function toggleFormRows(){
	var tbl = $("#formTable");
	
	tbl.attr('cellpadding','5'); 
	tbl.attr('bordercolor','#CCCCCC'); 	
	tbl.attr('border','1');
	tbl.css({'border-collapse':'collapse'});
	
	
	$("#formTable tr").each(function(){
		var tr = $(this);
		tr.addClass("normal_white");
		
		tr.bind('mouseover', function(){
			$(this).addClass("highlight_white");
		});
		tr.bind('mouseout', function(){
			$(this).removeClass("highlight_white");
			$(this).addClass("normal_white");
		});
	});
}