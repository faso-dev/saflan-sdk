<?php
	
	namespace FasoDev\SaflanSdk\Saflan\Contracts;
	
	interface MobileDataChargeable
	{
		public function charge(string $codeData, array $phoneNumbers = []): mixed;
	}
