# SAFLAN SDK

This package aim to simplify the use of the SAFLAN API
by providing a set of classes and functions to interact with the API.

## Requirements

Before using this package, you need to have a valid API login and password.
You also need to have theses requirements installed:

- PHP 7.4 or higher
- composer
- ext-json
- ext-curl

## Installation

You can install the package using composer:

```bash
composer require faso-dev/saflan-sdk
```

## Usage

When you have installed the package, you can use it in your code:

```php
	require __DIR__ . '/vendor/autoload.php';
	
	use FasoDev\SaflanSdk\Saflan\Config\Config;
	use FasoDev\SaflanSdk\Saflan\Config\DataCode;
	use FasoDev\SaflanSdk\Saflan\Credentials\Credentials;
	use FasoDev\SaflanSdk\Saflan\SaflanClient;
	
	$config = Config::auth(new Credentials('username', 'password'))
	                ->defineSslVerification(false)
	                ->defineTimeout(30)
	                ->defineBaseEndPoint('http://www.saflan-bf.com:7170/saflanentreprise')
	;
	
	$saflan = SaflanClient::loadConfig($config);
	
	$creditResponse = $saflan->credit()->chargeWithStandard(1000, ['702000000', '702000001']);
	$mobileMoneyCreditDataResponse = $saflan->credit()->chargeWithMobileMoney(1000, ['702000000', '702000001']);
	$mobileDataResponse = $saflan->mobileData()->charge(DataCode::MOOV_PROMO_10Go_9500F_30JRS, ['702000000', '702000001']);
	$transactionStatusReponse = $saflan->transaction()->checkStatus('p20220609.478');

```
- The `Credentials` class is used to store your API login and password.

- The `Config` class is used to configure the client such
as defining the credentials, the base endpoint, the timeout, the SSL verification and more.
- The `SaflanClient` class is used to load the configuration and to interact with the API.
So we have 3 endpoints methods: `credit()`, `mobileData()` and `transaction()`.
- The `credit()` endpoint method is used to interact with the credit REST API to buy credit for a given numbers.
- The `mobileData()` endpoint method is used to interact with the mobile data REST API to buy mobile data for a given numbers.
- The `transaction()` endpoint method is used to interact with the transaction REST API to check the status of a given transaction.
- The `DataCode` class is used to define the data code for the mobile data.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)

## Credits
[![FasoDev](https://avatars.githubusercontent.com/u/40303326?v=4)](https://github.com/faso-dev)
