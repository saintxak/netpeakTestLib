<?php
namespace saintxak\request\http;

class Native extends AHttpDriver{

    public function getData($url){
        $ctx_opts = [
            'http'=>[
                'method'=>$this->method,
                'header'=>$this->buildHeaders(),
            ],
        ];

        $ctx = stream_context_create($ctx_opts);
        
        return file_get_contents($url,false,$ctx);
    }

}