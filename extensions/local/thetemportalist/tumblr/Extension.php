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

			$this->addTwigFunction('tumblr_GetPosts', 'getPosts');

			$consumerKey = $this->getConfigValue('tumblroauth');
			$consumerSecret = $this->getConfigValue('tumblrsecret');
			$this->client = new Client($consumerKey, $consumerSecret);

			$this->client->getRequestHandler()->setBaseUrl('http://www.tumblr.com/');
			$req = $this->client->getRequestHandler()->request('POST', 'oauth/request_token', [
			  'oauth_callback' => '...',
			]);
			// Get the result
			$result = $req->body->__toString();
			//var_dump($req->body);
			//var_dump($result);
			parse_str($result);
			//var_dump($oauth_token);
			$this->client = new Client($consumerKey, $consumerSecret, $oauth_token, $oauth_token_secret);
			
			//$info = $this->client->getUserInfo();
			//var_dump($info);
			
			//$this->client->setToken($req->body['oauth_token'], $reg->body['oauth_token_secret']);
			/*
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
			*/
			
		}

		function getPosts($hostname) {
			var_dump($this->client->getUserInfo());
			var_dump($this->client->getBlogPosts($hostname));
			return "abc";//$this->client->getBlogPosts($hostname);
		}

	}

?>