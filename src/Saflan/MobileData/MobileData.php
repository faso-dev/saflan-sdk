<?php
	
	namespace FasoDev\SaflanSdk\Saflan\MobileData;
	
	use FasoDev\Components\Http\Clients\Curl\CurlRequestErrorException;
	use FasoDev\SaflanSdk\Saflan\Config\Config;
	use FasoDev\SaflanSdk\Saflan\Contracts\Chargeable;
	use FasoDev\SaflanSdk\Saflan\Contracts\MobileDataChargeable;
	use function fetch;
	
	class MobileData implements MobileDataChargeable
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
		public function charge(string $codeData, array $phoneNumbers = []): mixed
		{
			return fetch($this->config->baseEndPoint() . $this->config->mobileDataEndPoint(), 'post', [
				'login' => $this->config->credentials()->username(),
				'password' => $this->config->credentials()->password(),
				'msisdns' => implode(',', $phoneNumbers),
				'codeData' => $codeData,
			]);
		}
	}
