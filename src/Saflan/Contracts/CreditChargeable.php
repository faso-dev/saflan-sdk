<?php
	
	namespace FasoDev\SaflanSdk\Saflan\Contracts;
	
	interface CreditChargeable
	{
		public function chargeWithStandard(int $amount, array $phoneNumbers = []): mixed;
		
		public function chargeWithMobileMoney(int $amount, array $phoneNumbers = []): mixed;
	}
