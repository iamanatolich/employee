<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class ErrorController extends Controller
	{
		public function error() {
            $this->title = '404';
            return $this->render('error/notFound');
		}

        public function reconstruction()
        {
            $this->title = 'Технические работы';
            return $this->render('error/reconstruction');
        }
	}
