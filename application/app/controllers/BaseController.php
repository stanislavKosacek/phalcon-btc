<?php

use Phalcon\Mvc\Controller;
use Phalcon\Tag;
use Phalcon\Assets\Asset\Js;
class BaseController extends Controller
{

	public function onConstruct()
	{
		$this->assets->addAsset(new Js(
			'front/dist/bundle.js',
			true,
			true,
			[],
			null,
			true
		));
		Tag::setTitle('Bitcoin price');
	}
}
