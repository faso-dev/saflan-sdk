<?php
	
	namespace FasoDev\SaflanSdk\Saflan\Credentials;
	
	class Credentials implements CredentialsInterface
	{
		private string $username;
		private string $password;
		
		public function __construct(string $username, string $password)
		{
			$this->username = $username;
			$this->password = $password;
		}
		
		public function username(): string
		{
			return $this->username;
		}
		
		public function password(): string
		{
			return $this->password;
		}
	}
