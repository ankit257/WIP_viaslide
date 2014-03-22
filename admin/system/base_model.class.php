<?php
	require_once("base_database.class.php");
	
	if(!isset($db))
		$db = new Database(DB_HOST, DB_USER, DB_PWD, DB_NAME);
	
	class Emkt_Model
	{
		var	$db;
		var $table_name;
		function __construct($table)
		{
			global $db;
			$this->table_name = TABLE_PREFIX.$table;
			$this->db= $db;
		}
		
		function TotalRecords($query=1) {
			$q = "SELECT count(*) as Total FROM `{$this->table_name}` WHERE deleted=0 AND $query";
			$r = $this->db->query($q);

			if ($this->db->num_rows($r) > 0)
			{  
				$a = $this->db->fetch_array($r);
				return $a['Total'];
			}  
			
			return false;
		}

		function fetch_all($fields="*", $query=1)
		{

			$q = "SELECT $fields FROM `{$this->table_name}` WHERE deleted=0 AND $query";
			//echo $q;
			$r = $this->db->query($q);
			
			if ($this->db->num_rows($r) > 0)
			{  
				$a = $this->db->fetch_all_array($q);
				return $a;
			}  
			
			return false;
		}
		
		function fetch_single($fields="*", $query=1)
		{

			$q = "SELECT $fields FROM `{$this->table_name}` WHERE $query LIMIT 1";
			//echo $q;
			$r = $this->db->query($q);

			if ($this->db->num_rows($r) > 0)
			{  
				$a = $this->db->fetch_array($r);
				return $a;
			}  
			
			return false;
		}

		function fetch_singleField($field='id',$query=1)
		{

			$q = "SELECT $field FROM `{$this->table_name}` WHERE $query LIMIT 1";
			//echo $q;
			$r = $this->db->query($q);
			
			if ($this->db->num_rows($r) > 0)
			{  
				$a = $this->db->fetch_array($r);
				return $a[$field];
			}  
			
			return false;
		}
		
		public function add($data)
		{
			
			foreach($data as $index => $val)
			{
				$dbcol .= "`" . $index . "`, ";
				$dbval .= "'" . mysql_real_escape_string(stripslashes($val)) . "',";
			}
			$dbcol = '( ' . substr($dbcol,0,-2) . ' )';
			$dbval = ' VALUES ( ' . substr($dbval,0,-1) . ' )';
			
			$q = "INSERT INTO `{$this->table_name}` {$dbcol} {$dbval}";
				  
			//echo $q;
	
			if( !$this->db->query($q) )
				return false;
			
			return $this->db->last_id();
			
		}
		
		public function update($data,$query)
		{
			
			foreach($data as $index => $val)
			{
				$dbval .= ' `' . $index . '`=\'' . mysql_real_escape_string(stripslashes($val)) . '\',';
			}
			$dbval = substr($dbval,0,-1);
			$q = "UPDATE `{$this->table_name}` SET {$dbval} WHERE $query";
			//echo $q; return false;
			if(!$this->db->query($q))
				return false;

			return true;
			
		}
		
		function delete($query)
		{
			$q = "DELETE FROM `{$this->table_name}` WHERE $query";
			//echo $q;
			if ($this->db->query($q))
				return true;
		
			return false;

		}
		
		function query($q)
		{

			//$q = "SELECT * FROM `{$this->table_name}` WHERE $query";
			//echo $q;
			$r = $this->db->query($q);
			
			if ($this->db->num_rows($r) > 0)
			{  
				$a = $this->db->fetch_all_array($q);
				return $a;
			}  
			
			return false;
		}
	
	
		public function changeFieldValue($field, $query=1,$interchange=false)
		{
			if($interchange)
				$q = "UPDATE `{$this->table_name}` SET `$field` = CASE WHEN `$field` > 0 THEN 0 ELSE 1 END  WHERE $query";
			else
				$q = "UPDATE `{$this->table_name}` SET `$field` WHERE $query";
			//echo $q;
			$r = mysql_query($q);
			if(!$r)
				return false;
			return true;
		}
	
	}//End of Class
	
	

?>