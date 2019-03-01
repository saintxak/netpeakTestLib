<?php
namespace saintxak\reports\types;

use saintxak\elements\IElement;
use saintxak\reports\AType;

class JSON extends AType{

    public function appendElement(IElement $element){
        $attrs = $element->getAttributes();

        if (empty($this->data)){
            //json body
            $this->data = '[';
        }

        $this->data .= ',';

        $this->data .= json_encode($attrs);
    }

    public function getData(){
        return $this->data.']';
    }
}