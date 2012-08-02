$(document).ready(function(){
	$(window).bind('hashchange', function(){
		loadAjax2(window.location.hash);
	});
	loadAjax2(window.location.hash);
});
 
function myformsubmit(){
	
	$.ajax({
		  type: 'POST',
		  url: this.action,
		  data: $(this).serialize(),
		  dataType:'json',
		  beforeSend:function(){
		    // this is where we append a loading image
		    //$('#ajax-panel').html('<div class="loading"><img src="/images/loading.gif" alt="Loading..." /></div>');
		  },
		  success:function(jsonData){			
			  ajaxResponseHandler.call(jsonData);	      
		  },
		  error:function(){
		    // failed request; give feedback to user
		   // $('#ajax-panel').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
		  }
		});
	
	return false;
}

function loadAjax2(lurl){

	var url = lurl.replace('#', '');
	
	$.ajax({
	  type: 'GET',
	  url: url,
	  data: {},
	  dataType:'json',
	  
	  beforeSend:function(){
	    // this is where we append a loading image
	    //$('#ajax-panel').html('<div class="loading"><img src="/images/loading.gif" alt="Loading..." /></div>');
	  },
	  success:function(jsonData){
		
		  ajaxResponseHandler.call(jsonData);	      
	  },
	  error:function(){
	    // failed request; give feedback to user
	   // $('#ajax-panel').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
	  }
	});
}

function ajaxResponseHandler(){
	eval(this.run);
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
function loadme(me){
	if(typeof me == "object"){
		window.location.hash = me.getAttribute("maction");
	}else{
		window.location.hash = me;
	}
}