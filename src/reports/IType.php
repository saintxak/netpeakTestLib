<?php
namespace saintxak\reports;

use saintxak\elements\IElement;

interface IType{

    public function appendElement(IElement $element);
    public function getData();

}