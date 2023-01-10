<?php
	
	namespace FasoDev\SaflanSdk\Saflan\Config;
	
	use FasoDev\SaflanSdk\Saflan\Credentials\CredentialsInterface;
	
	class Config
	{
		protected string $baseEndPoint = "https://saflan-bf.com:7170/saflanentreprise";
		protected CredentialsInterface $credentials;
		protected bool $sslVerify = false;
		private int $timeout = 30;
		private self|null $singleton = null;
		protected string $creditEndPoint = "/rechargerCredit";
		protected string $mobileDataEndPoint = "/rechargerData";
		protected string $transactionEndPoint = "/readState";
		
		private function __construct(CredentialsInterface $credentials)
		{
			if (null === $this->singleton) {
				$this->credentials = $credentials;
				$this->singleton = $this;
			}
			
			return $this->singleton;
		}
		
		public static function auth(CredentialsInterface $credentials): Config
		{
			return new self($credentials);
		}
		
		public function baseEndPoint(): string
		{
			return $this->baseEndPoint;
		}
		
		public function credentials(): CredentialsInterface
		{
			return $this->credentials;
		}
		
		public function sslVerify(): bool
		{
			return $this->sslVerify;
		}
		
		public function timeout(): int
		{
			return $this->timeout;
		}
		
		public function defineBaseEndPoint(string $baseEndPoint): Config
		{
			$this->baseEndPoint = $baseEndPoint;
			
			return $this;
		}
		
		public function defineSslVerification(bool $sslVerify): Config
		{
			$this->sslVerify = $sslVerify;
			
			return $this;
		}
		
		public function defineTimeout(int $timeout): Config
		{
			$this->timeout = $timeout;
			
			return $this;
		}
		
		public function creditEndPoint(): string
		{
			return $this->creditEndPoint;
		}
		
		public function defineCreditEndPoint(string $creditEndPoint): Config
		{
			$this->creditEndPoint = $creditEndPoint;
			
			return $this;
		}
		
		public function transactionEndPoint(): string
		{
			return $this->transactionEndPoint;
		}
		
		public function defineTransactionEndPoint(string $transactionEndPoint): Config
		{
			$this->transactionEndPoint = $transactionEndPoint;
			
			return $this;
		}
		
		public function mobileDataEndPoint(): string
		{
			return $this->mobileDataEndPoint;
		}
		
		public function defineMobileDataEndPoint(string $mobileDataEndPoint): Config
		{
			$this->mobileDataEndPoint = $mobileDataEndPoint;
			
			return $this;
		}
	}
