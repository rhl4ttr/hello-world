<?php

$leftmenu []  =array(
		"title"=>"Dashboard",
		"link"=> "/admin/moderator/dashboard",


		"submenu"=>array());

$leftmenu []  =array(
"title"=>"Batch", 
"link"=> "/admin/batch/list",
		

"submenu"=>array(
		array('title'=> 'Create Batch', 'link'=>'/admin/batch/create'),
		array('title'=> 'List Batch', "link"=> "/admin/batch/list")
		));

$leftmenu []  =array(
		"title"=>"Student",
		"link"=> '/student/list',


		"submenu"=>array(
				array('title'=> 'Create Student', 'link'=>'/admin/student/create'),
				array('title'=> 'List Student', 'link'=>'/admin/student/list')
		));


?>

<!-- LEFT MENU STARTS HERE -->


 
<div class="left_menu" id="leftmenu">
<div class="sub_title_bar" style="height:20px;">OPTIONS</div>
<?php 

foreach($leftmenu as $cat=>$subcat){
	echo '<div class="left_navi_links" id="leftnavwrapper"><a href="javascript:void(0)" onclick="loadme(this);" maction="'.$subcat['link'].'">'.$subcat['title'].'</a></div>';
 	foreach($subcat["submenu"] as $name){
		echo '<div class="lmlinks"><a href="javascript:void(0)"   onclick="loadme(this);" maction="'.$name['link'].'">'.$name['title'].'</a></div>';
	}
 }



?>

</div>

<!-- LEFT MENU ENDS HERE -->