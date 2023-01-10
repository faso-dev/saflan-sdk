<?php
	
	use FasoDev\Components\Http\Clients\ClientResponseInterface;
	use FasoDev\Components\Http\Clients\Curl\CurlRequestErrorException;
	use FasoDev\SaflanSdk\Http\HttpClient;
	
	if (!function_exists('fetch')) {
		/**
		 * @throws CurlRequestErrorException
		 */
		function fetch(string $url, string $method = 'get', array $data = [], array $options = []): ClientResponseInterface
		{
			return (new HttpClient)($url, $method, $data, $options);
		}
	}
