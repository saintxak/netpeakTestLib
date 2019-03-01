<?php
namespace saintxak\elements;

class Element implements IElement{

    public function setAttributes(array $attrs){
        foreach ($attrs as $attr=>$val){
            $this->{$attr} = $val;
        }
    }

    public function getAttributes(){
        $class = new \ReflectionClass($this);
        $attrs = [];

        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            if (!$property->isStatic()) {
                $name = $property->getName();
                $attrs[$name] = $this->{$name};
            }
        }

        return $attrs;
    }

}