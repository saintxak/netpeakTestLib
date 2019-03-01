<?php
namespace saintxak\walkers;

use saintxak\filters\LinkFilter;

class HttpWalker extends AWalker{

    protected function getListUrls($url){
        $results = [];

        $filter = new LinkFilter();
        $this->request->setUrl($url);
        $urlsList = $filter->filterData($this->request->getData());

        $results[] = $url;

         if (!empty($urlsList)){
            foreach ($urlsList as $url){
                $url = $this->checkURL($url);

                if ($url && !isset($this->urls[$url]))
                    $this->urls[$url] = 0;

            }
        }

        return $results;
    }

    private function checkURL($url){
        if (is_array($url)) return false;
        
        $ch_url = parse_url($url);
        $curr_url = parse_url($this->defaultUrl);

        if (!isset($ch_url['host']) || (isset($ch_url['host']) && $ch_url['host'] == $curr_url['host'])){
            return $curr_url['scheme'].'://'.$curr_url['host'].((strpos($url,'/') == 0) ? '':'/').$url;
        }

        return false;
    }

}