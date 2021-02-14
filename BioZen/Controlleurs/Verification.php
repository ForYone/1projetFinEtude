<?php 
class Verification{

    public function verifQte($qte){
        if(preg_match("#^[0-9]+$#",$qte)){
            return true;
        }else{
            return false;   
        }

    }
}