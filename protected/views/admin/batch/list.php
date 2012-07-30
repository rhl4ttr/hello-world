<?php


echo '<table id="formTable" width="100%" class="listTable">
		<tr>
		<th></th>
		<th>Batch code</th>
		<th>Batch Location</th>
		<th>Batch Start Date</th>
		<th>Batch End Date</th>
		<th>Batch comments</th>
		</tr>
		';

/**
@var Batch $cnt
 */


foreach ($data->batches as $batch){
	/* @var $batch Batch */
	
	
	
	echo '<tr pkey="'.$batch->id.'" class="rowLink">
			<td><input type="checkbox" value="'.$batch->id.'" name="batchIds[]"/></td>
			<td>'.$batch->code.'</td>
			<td>'.$batch->location.'</td>
			<td>'.date('l d M, Y', $batch->startDate).'</td>
			<td>'.date('l d M, Y', $batch->endDate).'</td>
			<td>'.$batch->comments.'</td>
			</tr>	';
	
}





echo '</table>';

$data->pager->getLinks();

?>

<script type="text/javascript">
<!--
toggleFormRows();




$("#formTable tr").each(function(){
//


$(this).bind("click", function(){
	var pkey = $(this).attr("pkey");
	if(!pkey)return;
	
	top.location.hash = "/admin/batch/edit/id/"+pkey;
});



});

//-->

</script>