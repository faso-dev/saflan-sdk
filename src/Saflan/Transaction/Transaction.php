<?php
	
	namespace FasoDev\SaflanSdk\Saflan\Transaction;
	
	use FasoDev\Components\Http\Clients\ClientResponseInterface;
	use FasoDev\Components\Http\Clients\Curl\CurlRequestErrorException;
	use FasoDev\SaflanSdk\Saflan\Config\Config;
	use FasoDev\SaflanSdk\Saflan\Contracts\Transactionable;
	
	class Transaction implements Transactionable
	{
		protected Config $config;
		
		private function __construct(Config $config)
		{
			$this->config = $config;
		}
		
		public static function fromConfig(Config $config): self
		{
			return new self($config);
		}
		
		/**
		 * @throws CurlRequestErrorException
		 */
		public function checkStatus(string $transactionId): ClientResponseInterface
		{
			return fetch($this->config->baseEndPoint() . $this->config->transactionEndPoint(), 'post', [
				'login' => $this->config->credentials()->username(),
				'password' => $this->config->credentials()->password(),
				'transactionId' => $transactionId,
			]);
		}
	}
