<?php
namespace saintxak\request;

class FileRequest extends ARequest{

    protected function loadData(){
        if (!is_readable($this->url)) throw new RequestException('Error '.$this->url.' not exists or not readable');


        return file_get_contents($this->url);
    }

    public function getType(){
        return 'file';
    }
}