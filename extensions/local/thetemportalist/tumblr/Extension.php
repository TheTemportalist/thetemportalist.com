<?php
	namespace Bolt\Extension\TheTemportalist\Tumblr;
	use Symfony\Component\HttpFoundation\Request;
	use Bolt;
	use Silex\Application;
	use Tumblr\API\Client;

	class Extension extends \Bolt\BaseExtension {

		public function getName() {
			return "tumblr";
		}

		function getConfigValue($name) {
			return $this->app['config']->get('general/'.$name);
		}

		public function initialize() {

			$this->addTwigFunction('tumblr_GetUserInfo', 'getUserInfo');

			$client = new Client($this->getConfigValue('tumblroauth'), $this->getConfigValue('tumblrsecret'));
			
		}

		function getUserInfo($hostname, $oauth, $secret) {
			return $client->getUserInfo();//$this->app['guzzle.client']->get("google.com");//api.tumblr.com/v2/blog/".$hostname."/info?api_key=".$oauth);
		}

		function getPosts($hostname, $apiKey) {
			return "api.tumblr.com/v2/blog/".$hostname."/posts?api_key=".$apiKey;
		}

	}

?>