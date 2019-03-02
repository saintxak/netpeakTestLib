<?php
namespace saintxak\request\http;

class CURL extends AHttpDriver{

    public function getData($url){
        $out = '';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers());
        $out = curl_exec($ch);
        
        curl_close($ch);
        
        return $out;
    }

}