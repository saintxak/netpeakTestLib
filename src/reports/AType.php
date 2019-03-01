<?php
namespace saintxak\reports;

abstract class AType implements IType{
    protected $data;

    public function getData(){
        return $this->data;
    }
}