<?php

namespace vendor\core\base;

class View{

    /**
     * @var array
     */
    public $route = [];
    /**
     * @var string;
     */
    public $view;
    /**
     * @var string;
     */
    public $layout;
    /**
     * @var array; Varible regex for js scripts;
     */
    public $scripts = [];

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->view = $view;
        if($layout === false){
            $this->layout = false;
        }else $this->layout = $layout ?: LAYOUT;
    }

    public function render($vars){
        if(is_array($vars)) extract($vars);

        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();

        if(is_file($file_view)){
            require $file_view;
        }else echo "<p>Didn find view <b>{$file_view}</b></p>";

        $content = ob_get_clean();

        if(false !== $this->layout){

            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($file_layout)){
                $content = $this->getScripts($content);
                $scripts = [];
                if(!empty($this->scripts[0])){
                    $scripts = $this->scripts[0];
                }
                require $file_layout;
            }else echo "Can't find layout <b>{$file_layout}</b>";
        }
    }

    protected function getScripts($content){
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);
        if(!empty($this->scripts)){
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }

}
