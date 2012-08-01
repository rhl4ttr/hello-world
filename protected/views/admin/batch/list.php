
<?php


$html =  '
		
		<form name="search_form" id="search_form" action="/'.$this->id.'/list" method="post">
		<div>
		<input type="text" name="search_field" id="search_field" value="" size="30"/>
		<input type="submit" name="submit_find" value="Search" />
		</div>
				
		</form>
		
		<form name="content_list" id="content_list" action="/'.$this->id.'/delete" method="post">
		
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
					<a  href="#/'.$this->id.'/edit/id/'.$batch->id.'">edit</a></td>
			<td>'.$batch->code.'</td>
			<td>'.$batch->location.'</td>
			<td>'.date('l d M, Y', $batch->startDate).'</td>
			<td>'.date('l d M, Y', $batch->endDate).'</td>
			<td>'.$batch->comments.'</td>
			</tr>	';
	
}





$html .= '</table></form>';

$html .= $data->pager->getLinks();



echo json_encode(array("html"=>$html, "run"=>'$("#content").html(this.html);toggleFormRows();'));

?>