<?php
	namespace Core;
	
	class Controller
	{
		protected $layout = 'default';
		
		protected function render($view, $data = []) {
			return new Page($this->layout, $this->title, $view, $data);
		}

        public static function redirect($url)
        {
            header("Location: $url");
            die;
        }
	}
