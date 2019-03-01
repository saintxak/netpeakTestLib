<?php
namespace saintxak\filters;

class RegexFilter extends Filter{

    public function filterData($data){
        $matches = [];

        preg_match_all($this->searchParam, $data, $matches);

        if (!empty($matches[1]))
            return $matches[1];
        
        return $matches;
    }

}