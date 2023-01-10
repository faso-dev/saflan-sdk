<?php
	
	namespace FasoDev\SaflanSdk\Saflan\Contracts;
	
	interface Transactionable
	{
		public function checkStatus(string $transactionId): mixed;
	}
