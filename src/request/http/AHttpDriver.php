<?php
namespace saintxak\request\http;

use saintxak\request\IDriver;

abstract class AHttpDriver implements IDriver{
    protected $headers = [];

    public $method = 'GET';

    public function addHeader($key, $value){
        $this->headers[] = ['key'=>$key, 'value'=>$value];
    }

    public function setHeader($key, $value){
        foreach ($this->headers as &$header){
            if ($header['key'] === $key){
                $header['value'] = $value;
                break;
            }
        }
    }

    public function removeHeader($key){
        foreach ($this->headers as $key=>$header){
            if ($header['key'] === $key){
                unset($this->headers[$key]);
                break;
            }
        }
    }

    public function headers(){
        return $this->headers;
    }

    protected function buildHeaders(){
        $dump = '';

        foreach ($this->headers as $header){
            $dump .= $header['key'].": ".$header['value']."\r\n";
        }

        return $dump;
    }
}