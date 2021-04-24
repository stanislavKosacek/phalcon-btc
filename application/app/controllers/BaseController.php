<?php

use Phalcon\Mvc\Controller;
use Phalcon\Tag;

class BaseController extends Controller
{
	public function onConstruct()
	{
		$this->assets->addJs('front/dist/bundle.js');
		Tag::setTitle('Bitcoin price');
	}
}
