<?php



$evalCode = '
$("#content").html(this.html);
toggleFormRows();
$("#batch_search_form").submit(function(){
loadme("/'.$this->id.'/list/search/"+encodeURIComponent($("#batch_search_field").val()));
return false;
});
$("#batch_list_form").submit(myformsubmit);
		
		
';

$html =  '
		
		<form name="batch_search_form" id="batch_search_form" action="/'.$this->id.'/list" method="post">
		<div>
		<input type="text" name="batch_search_field" id="batch_search_field" value="" size="30"/>
		<input type="submit" name="submit_find" value="Search" />
		</div>
				
		</form>
		
		<form name="batch_list_form" id="batch_list_form" action="/'.$this->id.'/delete" method="post">
		
		<input type="submit" name="submit_delete" value="Delete" />	
				
		
		<table id="formTable" width="100%" class="listTable">
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
	
	
	
	$html .= '<tr pkey="'.$batch->id.'">
			<td><input type="checkbox" value="'.$batch->id.'" name="batchIds[]"/>
					<a href="javascript:void(0)" onclick="loadme(this);" maction="/'.$this->id.'/edit/id/'.$batch->id.'">edit</a></td>
			<td>'.$batch->code.'</td>
			<td>'.$batch->location.'</td>
			<td>'.date('l d M, Y', $batch->startDate).'</td>
			<td>'.date('l d M, Y', $batch->endDate).'</td>
			<td>'.$batch->comments.'</td>
			</tr>	';
	
}



$search = Yii::app()->request->getQuery("search", "");

$evalCode .= '$("#batch_search_field").val(this.search);';


$html .= '</table></form>';

$html .= $data->pager->getLinks($this->id.'/list/search/'.Yii::app()->request->getQuery("search", ""));



echo json_encode(array("html"=>$html, "run"=>$evalCode, 'search'=>$search));

?>