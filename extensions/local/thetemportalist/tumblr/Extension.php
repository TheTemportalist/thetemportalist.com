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
			$this->client = new Client($consumerKey, $consumerSecret);

			$requestHandler = $this->client->getRequestHandler();
			$requestHandler->setBaseUrl('https://www.tumblr.com/');
			$resp = $requestHandler->request('POST', 'oauth/request_token', array());
			$out = $result = $resp->body;
			$data = array();
			parse_str($out, $data);
			$this->client->setToken($data['oauth_token'], $data['oauth_token_secret']);

			$handle = fopen('php://stdin', 'r');
			$line = fgets($handle);
			$verifier = trim($line);
			$resp = $requestHandler->request('POST', 'oauth/access_token', array('oauth_verifier' => $verifier));
			$out = $result = $resp->body;
			$data = array();
			parse_str($out, $data);
			$token = $data['oauth_token'];
			$secret = $data['oauth_token_secret'];
			$this->client = new Client($consumerKey, $consumerSecret, $token, $secret);
			
		}

		function getUserInfo($hostname) {
			return $this->client->getUserInfo();//$this->app['guzzle.client']->get("google.com");//api.tumblr.com/v2/blog/".$hostname."/info?api_key=".$oauth);
		}

		function getPosts($hostname, $apiKey) {
			return "api.tumblr.com/v2/blog/".$hostname."/posts?api_key=".$apiKey;
		}

	}

?>