<?php
namespace saintxak\walkers;

class DirWalker extends AWalker{
    protected function getListUrls($path){
        $list = scandir($path);
        $results = [];

        foreach ($list as $file){
            if ($file == '.' || $file == '..') continue;
            if (is_dir($path.DIRECTORY_SEPARATOR.$file)){
                if (!isset($this->urls[$path.DIRECTORY_SEPARATOR.$file]))
                    $this->urls[$path.DIRECTORY_SEPARATOR.$file] = 0;
            }else{
                $results[] = $path.DIRECTORY_SEPARATOR.$file;
            }
        }

        return $results;
    }
}