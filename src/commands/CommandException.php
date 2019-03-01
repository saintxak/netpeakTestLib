<?php
namespace saintxak\commands;

class CommandException extends \Exception{
    
    public function __toString(){
        return "\033[0;31m".__CLASS__ . ": [{$this->code}]: {$this->message}\n"."\033[0m";
    }

}