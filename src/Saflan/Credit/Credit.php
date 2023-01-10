<?php
	
	namespace FasoDev\SaflanSdk\Saflan\Credit;
	
	
	use FasoDev\Components\Http\Clients\Curl\CurlRequestErrorException;
	use FasoDev\SaflanSdk\Saflan\Config\Config;
	use FasoDev\SaflanSdk\Saflan\Contracts\CreditChargeable;
	use function fetch;
	use function implode;
	
	class Credit implements CreditChargeable
	{
		const WITH_STANDARD = 0;
		const WITH_MOBILE_MONEY = 1;
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
		public function chargeWithStandard(int $amount, array $phoneNumbers = []): mixed
		{
			return $this->charge($amount, $phoneNumbers, self::WITH_STANDARD);
		}
		
		/**
		 * @throws CurlRequestErrorException
		 */
		public function chargeWithMobileMoney(int $amount, array $phoneNumbers = []): mixed
		{
			return $this->charge($amount, $phoneNumbers, self::WITH_MOBILE_MONEY);
		}
		
		/**
		 * @throws CurlRequestErrorException
		 */
		private function charge(int $amount, array $phoneNumbers = [], bool $withMobileMoney = false): mixed
		{
			$response = fetch($this->config->baseEndPoint() . $this->config->creditEndPoint(), 'post', [
				'login' => $this->config->credentials()->username(),
				'password' => $this->config->credentials()->password(),
				'msisdns' => implode(',', $phoneNumbers),
				'montant' => $amount,
				'option' => $withMobileMoney ? 1 : 0,
			]);
			
			return $response;
		}
	}
