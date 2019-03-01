<?php
namespace saintxak\request;

abstract class ARequest implements IRequest{
    protected $url;
    protected $data;
    protected $needUpdate = true;

    abstract protected function loadData();

    public function getData($update = false){
        if ($update || $this->needUpdate){
            $this->data = $this->loadData();
            $this->needUpdate = false;
        }

        return $this->data;
    }

    public function setUrl($url){
        $this->url = $url;
        $this->needUpdate = true;
    }

    public function getUrl(){
        return $this->url;
    }

    public function setDriver(IDriver $driver){
        $this->driver = $driver;
    }
}