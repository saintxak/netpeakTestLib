<?php
namespace saintxak\request;

use saintxak\request\http\AHttpDriver;
use saintxak\request\http\Native;

class HttpRequest extends ARequest{
    protected $driver = null;

    public function __construct(){
        $this->driver = new Native();
    }

    public function loadData(){
        return $this->driver->getData($this->url);
    }

    public function getType(){
        return 'http';
    }
}