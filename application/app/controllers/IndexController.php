<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    /**
     * Welcome and user list
     */
    public function indexAction()
    {
		//$this->assets->addJs('front/dist/bundle.js');
        $this->view->users = "test";
    }
}
