<?php

$leftmenu []  =array(
"title"=>"Batch", 
"link"=> "#/batches/list",
		
		
"submenu"=>array(
		array('title'=> 'Create Batch', 'link'=>'#/admin/batch/create'),
		array('title'=> 'List Batch', 'link'=>'#/admin/batch/list')
		));

$leftmenu []  =array(
		"title"=>"Student",
		"link"=> '#/student/list',


		"submenu"=>array(
				array('title'=> 'Create Student', 'link'=>'#/admin/student/create'),
				array('title'=> 'List Student', 'link'=>'#/admin/student/list')
		));


?>

<!-- LEFT MENU STARTS HERE -->


 
<div class="left_menu">

<?php 

foreach($leftmenu as $cat=>$subcat){
	echo '<div class="left_navi_links" id="leftnavwrapper"><a href="'.$subcat['link'].'">'.$subcat['title'].'</a></div>';
 	foreach($subcat["submenu"] as $name){
		echo '<div class="lmlinks"><a href="'.$name['link'].'">'.$name['title'].'</a></div>';
	}
 }



?>

</div>
<script type="text/javascript">
$(window).bind('hashchange', loadAjax);

/*$("#leftnavwrapper a, .lmlinks a").each(
		function(){
			
			$(this).bind('click', loadAjax);
			}
		);

		*/
</script>
<!-- LEFT MENU ENDS HERE -->