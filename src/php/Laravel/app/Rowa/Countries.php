<?php

/*
 * License: https://github.com/daredloco/Countries/blob/master/LICENSE
 * Github Link: https://github.com/daredloco/Countries/
 *
 * Copyrights: Roman Wanner 2020
 */

namespace App\Rowa;

class Countries {
    
    public $data;
    
    public function __construct($fname){
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
    
    public function getCountry($key = NULL){
        if(empty($key)){
            $key = './rowa/countries/countries.json';
        }
        
        foreach($this->data as $item){
            if($item->Key == $key){
                return $item;
            }
        }
        return false;
    }
}
