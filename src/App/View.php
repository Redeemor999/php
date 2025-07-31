<?php

namespace App;

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ){  
    }
    public static function make(string $view, array $params = []): static
    {
        return new static ($view, $params);
    }

    public function render()
    {
        $viewPath = VIEWS_PATH . '/' . $this->view . '.view.php';
        
        if(! empty($this->params)) {
            extract($this->params);
        }
        
        if(! file_exists($viewPath)) {
            echo 'File view nist';
        }
        
        include $viewPath;
    }
}