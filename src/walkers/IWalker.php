<?php
namespace saintxak\walkers;

use saintxak\filters\IFilter;
use saintxak\request\IRequest;

interface IWalker{

    public function getNext();
    public function length();
    public function setUrl($url);
    public function addFilter(IFilter $filter);
    public function setRequest(IRequest $request);
    public function getRequest();

}