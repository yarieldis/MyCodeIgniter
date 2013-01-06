<?php

require_once APPPATH."third_party/Twig/Autoloader.php";

Twig_Autoloader::register();


class Asset_Twig_Extension extends Twig_Extension
{

	public function getName()
	{
		return 'asset';
	}

	public function asset($path)
	{
		echo base_url()."assets/".$path;
	}

	public function getFunctions()
	{
		return array(
				'asset' => new Twig_Function_Method($this, 'asset'),
		);
	}

}

class URL_Twig_Extension extends Twig_Extension
{

	public function getName()
	{
		return 'url';
	}

	public function path($url, $var=false)
	{
		echo site_url($url);
	}

	public function getFunctions()
	{
		return array(
				'path' => new Twig_Function_Method($this, 'path'),
		);
	}

}

class Security_Twig_Extension extends Twig_Extension
{

	public function getName()
	{
		return 'security';
	}

	public function is_granted($permission)
	{
		return true;
	}

	public function getFunctions()
	{
		return array(
				'is_granted' => new Twig_Function_Method($this, 'is_granted'),
		);
	}

}


class Twig
{
	
	public function __construct()
	{
		
	}
	
	public function view($file, $data=array())
	{
		$loader = new Twig_Loader_Filesystem(APPPATH."/views");
		$environment = new Twig_Environment($loader, array(
				'cache' => APPPATH.'/cache',
				'debug' => true,
		));

		$environment->addExtension(new Asset_Twig_Extension());
		$environment->addExtension(new URL_Twig_Extension());
		$environment->addExtension(new Security_Twig_Extension());
		
		echo $environment->render($file, $data);
	}
	
}
