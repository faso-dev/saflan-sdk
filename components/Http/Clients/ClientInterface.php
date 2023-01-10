<?php
	
	namespace FasoDev\Components\Http\Clients;
	
	interface ClientInterface
	{
		public function get(
			string $url,
			array  $queries = [],
			array  $options = []): ClientResponseInterface;
		
		public function post(
			string $url,
			array  $data = [],
			array  $options = []): ClientResponseInterface;
	}
