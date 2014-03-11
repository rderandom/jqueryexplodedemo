<?php
/**
 * Object represents sql query with params

 */
class SqlQuery{
	var $txt;
	var $params = array();  //array that we fill with setString... it contains literals with simple quotes like 'PRODUCT123'
	var $idx = 0;			//$params number of items 

	/**
	 * Constructor
	 * @param String $txt SQL statement
	 */
	function SqlQuery($txt){
		$this->txt = $txt;
	}

	/** ==========================
	**	Start of private functions **
		========================== **/
		   
	/**
	 * Set string param
	 * @param String $value value set
	 */
	public function setString($value){
		$value = mysql_real_escape_string($value);
		$this->params[$this->idx++] = "'".$value."'";
	}
	
	/**
	 * Set string param
	 *
	 * @param String $value value to set
	 */
	public function set($value){
		$value = mysql_real_escape_string($value);
		$this->params[$this->idx++] = "'".$value."'";
	}
	

	/**
	 * Metoda zamienia znaki zapytania
	 * na wartosci przekazane jako parametr metody
	 *
	 * @param String $value wartosc do wstawienia
	 */
	public function setNumber($value){
		if($value===null){
			$this->params[$this->idx++] = "null";
			return;
		}
		if(!is_numeric($value)){
			throw new Exception($value.' is not a number');
		}
		$this->params[$this->idx++] = "'".$value."'";
	}

	/**
	 * 	Get sql query
	 *	First, it explodes $this->txt on the '?' marks
	 *  Then it replaces the marks with the params stored in $this->params
	 * @return String with SQL statement with params
	 */
	public function getQuery(){
		if($this->idx==0){
			return $this->txt;
		}
		$p = explode("?", $this->txt);
		$sql = '';
		for($i=0;$i<=$this->idx;$i++){
			if($i>=count($this->params)){
				$sql .= $p[$i];
			}else{
                            if("null"===$this->params[$i]){
                                $columnName = $this->getColumnName($p[$i]);
                                if(isset($columnName)){
                                    $sql .= $columnName."is ".$this->params[$i];
                                }else{
                                    $sql .= $p[$i].$this->params[$i];
                                }
                            }else{
                                $sql .= $p[$i].$this->params[$i];
                            }
			}
		}
		return $sql;
	}
		
        /** ==========================
		**	Start of private functions **
		   ========================== **/
        private function getColumnName($textCopy){
                $trimmedUppercaseSql = trim(strtoupper($this->txt));
                if($this->startsWith($trimmedUppercaseSql, "SELECT ")){
                    $rightTrimmedTextCopy = rtrim($textCopy, " ");
                    $columnName = rtrim($rightTrimmedTextCopy, "=");
                    if(strlen($columnName) !== strlen($rightTrimmedTextCopy)){
                        return $columnName;
                    }
                }
                return null;
        }
	
		/**
		 * Function to check if a string starts with a given text
		 * 
		 * @param type $haystack the string
		 * @param type $needle the given text
		 * @return type true if the string starts with the text
		 */
		private function startsWith($haystack, $needle){
			return !strncmp($haystack, $needle, strlen($needle));
			
		}
	
	/**
	 * Function replace first char
	 *
	 * @param String $str
	 * @param String $old
	 * @param String $new
	 * @return String
	 
	private function replaceFirst($str, $old, $new){
		$len = strlen($str);
		for ($i=0;$i<$len;$i++){
			if($str[$i]==$old){
				$str = substr($str,0,$i).$new.substr($str,$i+1);
				return $str;
			}
		}
		return $str;
	}*/
        

        /**
         * Function to check if the string ends with the given text
         * 
         * @param type $haystack the string
         * @param type $needle the given text
         * @return boolean true if the string ends with the text
         
        private function endsWith($haystack, $needle)
        {
            $length = strlen($needle);
            if ($length == 0) {
                return true;
            }

            return (substr($haystack, -$length) === $needle);
        }  */      
}
?>