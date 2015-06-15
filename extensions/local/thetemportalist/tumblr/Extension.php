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

		private $client;

		public function initialize() {

			$this->addTwigFunction('tumblr_GetUserInfo', 'getUserInfo');

			$consumerKey = $this->getConfigValue('tumblroauth');
			$consumerSecret = $this->getConfigValue('tumblrsecret');
			$this->client = new Client($oauth, $secret);
			$this->client->setToken('t1', 't2');
			$this->client->getUserInfo();
			
		}

		function getUserInfo($hostname, $oauth, $secret) {
			return $this->client->getUserInfo();//$this->app['guzzle.client']->get("google.com");//api.tumblr.com/v2/blog/".$hostname."/info?api_key=".$oauth);
		}

		function getPosts($hostname, $apiKey) {
			return "api.tumblr.com/v2/blog/".$hostname."/posts?api_key=".$apiKey;
		}

	}

?>