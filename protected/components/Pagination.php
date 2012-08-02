<?php


class Pagination{
	public $per_page;
	public $per_page_link;
	public $current_page;
	public $total_items;
	public $total_pages;
	public $bounds;
	
	const BROWSE_LIMIT = 50;
	const SEARCH_LIMIT = 50;
	const ALERT_ADS_LIMIT = 50;
	const ALLALERTS_ADS_LIMIT = 50;
	
	const DEFAULT_REPLY_PER_PAGE  = 10;
	
	const DEFAULT_BROWSE_PER_PAGE  = 10;
	const DEFAULT_SEARCH_PER_PAGE  = 10;
	const DEFAULT_ALERTADS_PER_PAGE  = 10;
	const DEFAULT_ALLALERTSADS_PER_PAGE  = 10;
	
	const DEFAULT_MYALERTS_PER_PAGE  = 10;
	
	function __construct($per_page=1,$per_page_link=1,$current_page,$total_items=0,$show_all_links=false){
		$this->per_page=(int)$per_page;
		$this->per_page_link=(int)$per_page_link;
		$this->total_pages=ceil($total_items/$per_page);
		/*if($show_all_links===true){
			$this->per_page_link=$this->total_pages;
		}*/
		$whichPage=(int)$current_page;
		if($whichPage==0){
			$whichPage=1;
		}
		$this->current_page=$whichPage;
		$this->total_items=(int)$total_items;
		$this->get_page_links_bounds();
	}
	
	public function getShowing(){
		if($this->isValidPage()){
			return ($this->getOffset()+1).'-'.$this->getOffetUpper();
		}else{
			return "0-0";
		}
	}
	

	
	public function getOffetUpper(){
		if($this->has_next_page()){
			return $this->getOffset()+ $this->per_page;
		}else{
			$check = ($this->current_page)*$this->per_page;
			
			return ($check > $this->total_items ? $this->total_items : $this->getOffset() + $this->per_page);
		} 
	}
	
	public function getItems2Fetch(){
		return $this->getOffetUpper() - $this->getOffset();
	}
	

	
	public function setTotalItems($total,$force=false){
		if($force){
			$this->total_items=$total;
		}else{
			if($this->total_items >= $total){
				$this->total_items = $total;
			}
		}
		$this->total_pages=ceil($this->total_items/$this->per_page);
		$this->get_page_links_bounds();
	}
	
	public function getTotalItems(){
		return $this->total_items;
	}
	
	public function isValidPage(){
		return (($this->current_page-1)*$this->per_page < $this->total_items);
	}
	
	function has_next_page(){
		if(($this->current_page * $this->per_page) < $this->total_items){
			return true;
		}
		return false;
	}

	function has_previous_page(){
		if($this->current_page > 1){
				return true;
		}		
		return false;
		/*
		if(ceil($this->current_page/$this->per_page_link) > 1){
			return true;
		}
		return false;
		*/
	}

	function get_previous_page(){
		return $this->current_page -1;
	}

	function get_next_page(){
		return $this->current_page +1;
	}

	function getOffset(){
		return ($this->current_page - 1)*$this->per_page;
	}


	function get_page_links_bounds(){
		/*
		$range=ceil($this->current_page/$this->per_page_link);		
		
		$upper_limit=$range*$this->per_page_link;

		if(($upper_limit * $this->per_page) > $this->total_items){
			$upper_limit=ceil($this->total_items/$this->per_page);
		}else{
			$upper_limit=$range*$this->per_page_link;
		}

		$lower_limit=($range*$this->per_page_link) - $this->per_page_link +1;

		$this->bounds=array("lower"=>$lower_limit,"upper"=>$upper_limit);
	}
	*/

	$range=ceil($this->current_page/$this->per_page_link) - 1;

	$lower_limit=($range *  $this->per_page_link) +1;

	$upper_limit=($range *  $this->per_page_link) +$this->per_page_link;
	
	if(($upper_limit * $this->per_page) > $this->total_items){
			$upper_limit=ceil($this->total_items/$this->per_page);
	}

	$this->bounds=array("lower"=>$lower_limit,"upper"=>$upper_limit);

	}
	
	
	public function getLinks($context){
		if($this->total_pages<=1 || $this->total_items<=0)return "";
		
		$html = '';
		$html .= '<div class="mbox pager_wrapper"><ul class="mpager">';

		//<li class="previous-off">«Previous</li>
		for($i = $this->bounds["lower"]; $i <= $this->bounds["upper"]; $i++){
			if($i==$this->current_page){
				$html .= "<li class='active'>{$i}</li>";
			}else{
				$html .= "<li><a href='javascript:void(0)' onclick='loadme(this);' maction='/{$context}/page/{$i}'>{$i}</a></li>";
			}
		}
		
		
		//<li class="next"><a href="?page=2">Next »</a></li>
		$html .= '</ul></div>';
		
		return $html;
	}
}	


?>