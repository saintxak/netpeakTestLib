<?php
namespace saintxak\filters;

class Filter implements IFilter{
    public $searchParam = '';

    public function filterData($data){
        $startPost = 0;
        $nextPos = 0;
        $results = [];

        while (($nextPos = stripos($data,$this->searchParam,$nextPos)) !== false){
            $results[] = substr($data,$nextPos,strlen($this->searchParam));
            $nextPos += strlen($this->searchParam);
        }

        return $results;
    }

    public function setSearchParam($param){
        $this->searchParam = $param;
    }
}