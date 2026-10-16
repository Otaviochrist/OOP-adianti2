<?php

class Element{
  public function __construct(public string $name, public array $properties = [], public array $children = []){ }

  public function __set($prop, $value){
    $this->properties[$prop] = $value;
  }

  public function add($child){
    $this->children[] = $child;
  }

  public function show(){
    echo '<' . $this->name;
    foreach($this->properties as $k => $v){
      echo ' ' . $k . '="' . $v . '"';
    }
    echo '>';
    foreach($this->children as $child){
      if(is_object($child)){
        $child->show();
      }else{
        echo $child;
      }
    }
    echo '</' . $this->name . '>';
  }
}