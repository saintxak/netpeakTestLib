<?php
namespace saintxak\commands;

class CommandDispatcher{

    protected $commandList = [];

    public function __construct(array $commands=[]){
        if (!empty($commands)){
            foreach ($commands as $command){
                $this->add($command);
            }
        }
    }

    public function dispatch(array $params=[]){
        $params = array_merge($_SERVER['argv'],$params);
        $command_name = isset($params[1]) ? $params[1]:'';
        return $this->call($command_name,array_slice($params,2));
    }

    public function add(ICommand $command){
        $this->commandList[$command->getName()] = $command;

        return $this;
    }

    public function remove($name){
        if ($this->checkExists($name)){
            unset($this->commandList[$name]);
            return true;
        }

        return false;
    }

    public function call($name, array $args=[]){
        if ($this->checkExists($name)){
            try{
                $this->commandList[$name]->run($args);

                return true;
            }catch(CommandException $e){
                echo $e;
                return true;
            }catch(Exception $e){
                echo $e;
            }
        }

        return false;
    }

    public function checkExists($name){
        return isset($this->commandList[$name]);
    }

}