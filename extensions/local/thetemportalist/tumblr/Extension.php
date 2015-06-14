<?php
	namespace Bolt\Extension\TheTemportalist\Tumblr;
	use Symfony\Component\HttpFoundation\Request;
	use Bolt;
	use Silex\Application;

	class Extension extends \Bolt\BaseExtension {

		public function getName() {
			return "tumblr";
		}

		public function initialize() {

			$this->addTwigFunction('tumblr_GetUserInfo', 'getUserInfo');
			
		}

		function getUserInfo($hostname, $oauth, $secret) {
			return "api.tumblr.com/v2/blog/".$hostname."/info?api_key=".$oauth;//$this->app['request']->get("api.tumblr.com/v2/blog/".$hostname."/info?api_key=".$oauth);
		}

	}

?>