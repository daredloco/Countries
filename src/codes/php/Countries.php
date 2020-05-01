<?php

/*
 * License: https://github.com/daredloco/Countries/blob/master/LICENSE
 * Github Link: https://github.com/daredloco/Countries/
 *
 * Copyrights: Roman Wanner 2020
 */

namespace Rowa{
	class Cities {
		public $data = [];
		
		public function __construct($dir = ""){
			if(empty($dir)){
				$dir = "../../cities/";
			}
			$countries = new Countries();
			foreach($countries->data as $country){
				$fname = $dir.$country->ISO2.".json";
				if(file_exists($fname)){
					$fcontent = file_get_contents($fname);
					//REMOVE UNWANTED CHARS
					for ($i = 0; $i <= 31; ++$i) { 
						$fcontent = str_replace(chr($i), "", $fcontent); 
					}
					$fcontent = str_replace(chr(127), "", $fcontent);
					if (0 === strpos(bin2hex($fcontent), 'efbbbf')) {
					   $fcontent = substr($fcontent, 3);
					}
					//REMOVE UNWANTED CHARS END
					$jsondata = json_decode( $fcontent );
					$data[$country->ISO2] = $jsondata;
				}
			}
		}
	}
	
	class Countries {
		
		public $data;
		
		public function __construct($fname = ""){
			if(empty($fname)){
				$fname = './countries.json';
			}
			$fcontent = file_get_contents($fname);   
			
			//REMOVE UNWANTED CHARS
			for ($i = 0; $i <= 31; ++$i) { 
				$fcontent = str_replace(chr($i), "", $fcontent); 
			}
			$fcontent = str_replace(chr(127), "", $fcontent);
			if (0 === strpos(bin2hex($fcontent), 'efbbbf')) {
			   $fcontent = substr($fcontent, 3);
			}
			//REMOVE UNWANTED CHARS END
			
			$jsondata = json_decode( $fcontent );
			$this->data = $jsondata;
		}
		
		public function getCountry($key){
			foreach($this->data as $item){
				if($item->Key == $key){
					return $item;
				}
			}
			return false;
		}
	}
}
?>