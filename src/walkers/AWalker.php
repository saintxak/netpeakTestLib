<?php
namespace saintxak\walkers;

use saintxak\request\IRequest;
use saintxak\filters\IFilter;
use saintxak\request\RequestException;

abstract class AWalker implements IWalker{

    protected $defaultUrl;
    protected $urls = [];
    protected $request = null;
    protected $filters = [];

    public $errors = [];

    public function __construct(IRequest $request){
        $this->request = $request;
    }

    public function setRequest(IRequest $request){
        $this->request = $request;
    }

    public function getRequest(){
        return $this->request;
    }

    public function getNext(){
        $isParsed = current($this->urls);
        $path = key($this->urls);
        $list = [];
        $results = [];

        if ($isParsed == 0){
            $list = $this->getListUrls($path);
            $this->urls[$path] = 1;
        }else{
            $isParsed = next($this->urls);
            if ($isParsed === 0){
                $path = key($this->urls);
                $list = $this->getListUrls($path);
                $this->urls[$path] = 1;
            }
        }

        if (!empty($list)){
            foreach ($list as $url){
                if ($this->request->getUrl() !== $url)
                    $this->request->setUrl($url);

                foreach ($this->filters as $filter){
                    try{

                        $res = $filter->filterData($this->request->getData());
                        if (!empty($res))
                            $results[$url][] = $res;

                    }catch(RequestException $e){
                        $this->errors[] = $e->getMessage();
                    }
                }
            }
        }

        return ($isParsed !== false) ? $results:false;
    }
    
    public function length(){
        return count($this->urls);
    }

    public function setUrl($url){
        $this->defaultUrl = $url;
        $this->urls[$url] = 0;
    }
    
    public function addFilter(IFilter $filter){
        $this->filters[] = $filter;
    }

    abstract protected function getListUrls($path);
}