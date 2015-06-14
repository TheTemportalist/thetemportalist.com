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

			// todo configged 'Notifications'
			// get() post() or match() (for both)
			// $this->config['path']

			$this->addTwigFunction('tumblr_GetUserInfo', 'getUserInfo');
			
		}

		function getUserInfo($hostname, $oauth, $secret) {
			return $this->app->match("api.tumblr.com/v2/blog/".$hostname."/info?api_key=".$oauth);
		}

	}

?>