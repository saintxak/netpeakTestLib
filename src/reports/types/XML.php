<?php
namespace saintxak\reports\types;

use saintxak\elements\IElement;
use saintxak\reports\AType;

class XML extends AType{

    public function appendElement(IElement $element){
        $attrs = $element->getAttributes();

        if (empty($this->data)){
            //create header columns
            $this->data = '<?xml version = "1.0"?><items>';
        }

        $this->data .= '<item>';
        foreach ($attrs as $name=>$val){
            $this->data .= "<$name>$val</$name>";
        }
        $this->data .= '</item>';
    }

    public function getData(){
        return $this->data.'</items>';
    }

}