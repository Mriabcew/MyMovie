<?php

class AppContoller {

    private $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isPost():bool
    {
        return $this->request === 'post';
    }
    protected function isGet():bool
    {
        return $this->request === 'get';
    }


    protected function render(string $template = null,array $variables = [])
    {
        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found';
                
        if(file_exists($templatePath)){
            extract($variables);
            
            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }
}