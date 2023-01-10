<?php
	
	namespace FasoDev\SaflanSdk\Saflan\Credentials;
	
	interface CredentialsInterface
	{
		public function username(): string;
		
		public function password(): string;
	}
