<?php

/** 
 *  This is a controller class to set up the rendering engine.
 * 
 *  @author Peter Panayotopoulos
 */
class CatListController extends stdClass{
    protected $template;
    public function __construct($template) {
        $this->template = $template;
    }
    public function __get($name){
        if(property_exists($this, $name)){
            return $this->$name;
        }
        return null;
    }
    /**
     *  Set optional params to be sent to the renderer
     * @param type $params
     */
    public function setParams($params = array()){
          $reserved = array(
            'template','post'
        );
        foreach($params as $key => $value){
            if(in_array($key,$reserved)){continue;}
            $this->$key = $value;
        }
    }
    /**
     * Child classes should overwrite this function for custom rendering engines
     *  
     */
    public function render($posts){
        foreach($posts as $post){
            $this->post = $post;
            include $this->template;
        }
    }
}

