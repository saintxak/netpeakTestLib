<?php
namespace saintxak\request;

interface IRequest{
    public function getType();
    public function setUrl($url);
    public function getUrl();
    public function getData($update=false);
    public function setDriver(IDriver $driver);
}