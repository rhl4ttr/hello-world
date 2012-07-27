$(document).ready(loadAjax);
 
function loadAjax(){
	if(! window.location.hash){
		return;
	}
	
	var url = window.location.hash.replace('#', '');
	/*$.ajax({
		 type: "POST",
		 url: url,
		 dataType: "html",
		 success: function(re) {
			 //$id("loading").style.display="none";
                $("#content").html(re);
		 } }) 
	*/
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