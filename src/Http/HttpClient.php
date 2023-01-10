<?php
	
	namespace FasoDev\SaflanSdk\Http;
	
	use Exception;
	use FasoDev\Components\Http\Clients\Curl\CurlClient;
	use FasoDev\Components\Http\Clients\Curl\CurlRequestErrorException;
	use FasoDev\Components\Http\Clients\ClientResponseInterface;
	use function in_array;
	
	class HttpClient
	{
		/**
		 * @throws CurlRequestErrorException|Exception
		 */
		public function __invoke(
			string $url,
			string $method = 'get',
			array  $data = [],
			array  $options = []
		)
		{
			if (!in_array($method, ['get', 'post'], true)) {
				throw new Exception('Invalid method');
			}
			
			return $this->{$method}($url, $data, $options);
			
		}
		
		/**
		 * @throws CurlRequestErrorException
		 */
		private function get(string $url, array $queries = [], array $options = []): ClientResponseInterface
		{
			return CurlClient::client()->get($url, $queries, $options);
		}
		
		/**
		 * @throws CurlRequestErrorException
		 */
		private function post(string $url, array $data, array $options): ClientResponseInterface
		{
			return CurlClient::client()->post($url, $data, $options);
		}
	}
