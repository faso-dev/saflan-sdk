<?php
	
	namespace FasoDev\SaflanSdk\Saflan;
	
	
	use FasoDev\SaflanSdk\Saflan\Config\Config;
	use FasoDev\SaflanSdk\Saflan\MobileData\MobileData;
	use FasoDev\SaflanSdk\Saflan\Credit\Credit;
	use FasoDev\SaflanSdk\Saflan\Transaction\Transaction;
	
	class SaflanClient
	{
		private Config $config;
		
		private function __construct(Config $config)
		{
			$this->config = $config;
		}
		
		public static function loadConfig(Config $config): self
		{
			return new self($config);
		}
		
		
		public function credit(): Credit
		{
			return Credit::fromConfig($this->config);
		}
		
		public function mobileData(): MobileData
		{
			return MobileData::fromConfig($this->config);
		}
		
		public function transaction(): Transaction
		{
			return Transaction::fromConfig($this->config);
		}
	}
