<?php
namespace saintxak\reports\types;

use saintxak\elements\IElement;
use saintxak\reports\AType;

class CSV extends AType{

    public function appendElement(IElement $element){
        $attrs = $element->getAttributes();

        if (empty($this->data)){
            //create header columns
            $this->data = implode(';',array_keys($attrs))."\r\n";
        }

        $this->data .= "\r\n";

        foreach ($attrs as $name=>$val){
            $this->data .= $val.";";
        }
    }

}