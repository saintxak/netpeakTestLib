<?php
namespace saintxak;

use saintxak\walkers\IWalker;
use saintxak\walkers\DirWalker;
use saintxak\walkers\HttpWalker;
use saintxak\request\FileRequest;
use saintxak\request\HttpRequest;

class WalkerBuilder{
    static public function buildFromURL($url){
        $scheme = parse_url($url,PHP_URL_SCHEME);

        if ($scheme === false) $scheme = '';
        
        $ob = null;

        switch ($scheme){
            case 'http': 
            case 'https': $ob = self::buildHttpWalker($url); break;
            default: $ob = self::buildDirWalker($url);
        }

        return $ob;
    }

    static public function buildDirWalker($path){
        $req = new FileRequest();
        return self::buildWalker(new DirWalker($req),$path);
    }

    static public function buildHttpWalker($url){
        $req = new HttpRequest();
        return self::buildWalker(new HttpWalker($req),$url);
    }

    static public function buildWalker(IWalker $walker, $url){
        $walker->setUrl($url);
        return $walker;
    }
}