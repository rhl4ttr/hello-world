<?php


class MockData{
	
	
	protected $mappings;
	protected $pKey;
	protected $tableName;
	protected $databaseName;
	
	
	
	public function getMapping(){
		return $this->mappings;
	}
	
	public function save(){		
		
		if(empty($this->{$this->pKey})){
			return $this->insert();
		}else{
			return $this->update();
		}
		
		
	}
	
	
	public function insert(){
		$temp = $this->mappings;
		unset($temp[$this->pKey]);
		
		
		$columns = array_values($temp);
			
		$params = ':'. join(', :', $columns);
		
		
		$sql = 'INSERT INTO '. $this->tableName.' ('.
				join(',',  $columns).') VALUES ('.
				$params.')';
		
		
		$conn = DbConnection::getInstance()->getConnection($this->databaseName, DbConnection::WRITE_SERVER);
		
		$prepped = $conn->prepare($sql);
		
		
		
		foreach($temp as $modelVar => $modelColumn){			
			$prepped->bindParam(":{$modelColumn}", $this->$modelVar);
		}
		
		$prepped->execute();
		
		$this->{$this->pKey} = $conn->lastInsertId();

		
		return $prepped->rowCount();
		
	}
	
	
	
	
	public function update(){
		$temp = $this->mappings;
		unset($temp[$this->pKey]);
		
		
		$columns = array_values($temp);		
		
		$sql = 'UPDATE '. $this->tableName.' SET ';
		
		$set = array();
		
		$params = array();
		
		foreach ($temp as $modelVar => $modelColumn){
			
			if(!is_null($this->$modelVar)){
				$set[] = "{$modelColumn}=:{$modelColumn}";
				
				
				$params[$modelVar] = $modelColumn;
			}
			
		}
		

		
		$sql .= join(',', $set);
		
		$sql .= ' WHERE '. $this->pKey .'=:pkey';
		
		
		if(property_exists($this, "organizationId")){
			$sql .= ' AND org_id = '. $this->organizationId;
		}
		
		
		$conn = DbConnection::getInstance()->getConnection($this->databaseName, DbConnection::WRITE_SERVER);
		
		$prepped = $conn->prepare($sql);
		
		foreach($params as $modelVar => $modelColumn){
			$prepped->bindParam(":{$modelColumn}", $this->$modelVar);
		}
		
		$prepped->bindParam(":pkey", $this->{$this->pKey});
		
		$prepped->execute();
		
		return $prepped->rowCount();
	}
	
	
	
	public function load($id = null, $connectionType = DbConnection::READ_SERVER){
		$id = empty($id)?$this->{$this->pKey}:$id;
		
		$pkeyColumn = $this->mappings[$this->pKey];
				
		$sql = 'SELECT ' . join(',',  array_values($this->mappings)) .' FROM '. $this->tableName.' WHERE '.$pkeyColumn .' = :pkey';
		
		$conn = DbConnection::getInstance()->getConnection($this->databaseName, $connectionType);
		
		$prepped = $conn->prepare($sql);
		
		$prepped->bindParam(':pkey', $id);
		
		$prepped->execute();
		
		$row = $prepped->fetch(PDO::FETCH_ASSOC);
		
		foreach($this->mappings as $modelVar => $modelColumn){
			$this->{$modelVar} = $row[$modelColumn];
		}
		
	}
	
	
	public function delete($id = null){
		$id = empty($id)?$this->{$this->pKey}:$id;
		
		$pkeyColumn = $this->mappings[$this->pKey];
	
		$sql = 'DELETE FROM '. $this->tableName.' WHERE '.$pkeyColumn .' = :pkey';

		if(property_exists($this, "organizationId")){
			$sql .= ' AND org_id = '. $this->organizationId;
		}
	
		$conn = DbConnection::getInstance()->getConnection($this->databaseName, DbConnection::WRITE_SERVER);
	
		$prepped = $conn->prepare($sql);
	
		$prepped->bindParam(':pkey', $id);
	
		$prepped->execute();
	
		return $prepped->rowCount();	
	}
	
	
	public function find($options = array()){	
		

		$condition = ' WHERE ';
		
		$set = array();
		foreach ($this->mappings as $modelVar => $modelColumn){
				
			if(!is_null($this->$modelVar)){
				$set[] = "{$modelColumn}=:{$modelColumn}";
		
		
				$params[$modelVar] = $modelColumn;
			}
				
		}
		
		$condition .= join(' AND ', $set);

		
		
		
		$start = '';
		if(array_key_exists("start", $options)){
			$start = $options["start"].', ';
		}
		
		$limit = ' LIMIT '. $start.' 10';
		if(array_key_exists("rows", $options)){
			$limit = ' LIMIT '. $start.' '.$options["rows"];
		}
		
		
		$sort = '';
		if(array_key_exists("sort", $options)){
			$sort = ' ORDER BY '. key($options["sort"]). ' '.current($options["sort"]);			
		}		
		

		$sql = 'SELECT * FROM '.$this->tableName. $condition.$limit.$sort;
		
		$conn = DbConnection::getInstance()->getConnection($this->databaseName, DbConnection::READ_SERVER);
		
		$prepped = $conn->prepare($sql);
		
		
		foreach($params as $modelVar => $modelColumn){
			$prepped->bindParam(":{$modelColumn}", $this->$modelVar);
		}
		
		$prepped->execute();		
		
		
		$objArray = $this->getObjects($prepped);
		
		return $objArray;
	}
	
	
	public function getObjects($prepped){
		$className = get_class($this);
		
		$objArray  = array();
		
		while($row = $prepped->fetch(PDO::FETCH_ASSOC)){
			
			$obj = new $className();
				
			$mapping = $obj->getMapping();
				
			foreach($mapping as $modelVar => $modelColumn){
				$obj->{$modelVar} = $row[$modelColumn];
			}
				
			$objArray[] = $obj;
		}
		
		return $objArray;
	}
	
}