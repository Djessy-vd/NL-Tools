# NL-Tools

[![PHP](https://img.shields.io/badge/PHP-8.5%2B-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![PHPUnit](https://img.shields.io/badge/PHPUnit-13.3%2B-3C9CD7?logo=php&logoColor=white)](https://phpunit.de/)
[![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)
[![Tests](https://github.com/Djessy-vd/NL-Tools/actions/workflows/tests.yml/badge.svg)](https://github.com/Djessy-vd/NL-Tools/actions/workflows/tests.yml)

NL-Tools is a PHP Composer package containing reusable utilities for common Dutch data formats and conventions.

The package focuses on simple validation and formatting utilities that can be used in PHP applications without additional dependencies.

## Installation

Install NL-Tools using Composer:

```bash
composer require djessy/nl-tools
```

## Requirements

- PHP 8.5 or higher
- Composer

## Features

- Dutch postal code validation and formatting
- Dutch IBAN format validation
- Dutch VAT number format validation
- Dutch license plate validation
- Dutch holidays and special days
- Dutch mobile phone number validation

## Usage

### Postal codes

```php
use Djessy\NlTools\Postcode;

$postcode = new Postcode();

$postcode->validatePostalCode('5038EA');
// true

$postcode->formatPostalCode('5038ea');
// 5038 EA
```

### IBAN

```php
use Djessy\NlTools\Iban;

$iban = new Iban();

$iban->validateIban('NL43ABNA0417164322');
// true
```

> IBAN validation currently checks the Dutch IBAN format. Full IBAN checksum validation is not currently implemented.

### VAT numbers

```php
use Djessy\NlTools\Btw;

$btw = new Btw();

$btw->validateBtw('NL123456789B01');
// true
```

### License plates

```php
use Djessy\NlTools\Kenteken;

$kenteken = new Kenteken();

$kenteken->validateKenteken('AB-12-34');
// true
```

### Holidays

```php
use Djessy\NlTools\Feestdagen;

$feestdagen = new Feestdagen();

$feestdagen->getFeestdagen(2026);
```

This returns the supported Dutch holidays and special days for the requested year.

### Phone numbers

```php
use Djessy\NlTools\Telefoonnummer;

$telefoonnummer = new Telefoonnummer();

$telefoonnummer->validateTelefoonnummer('06-12345678');
// true
```

International Dutch mobile numbers are also supported:

```php
$telefoonnummer->validateTelefoonnummer('+31 6 12345678');
// true
```

## Testing

NL-Tools uses PHPUnit for automated testing.

Run the test suite with:

```bash
vendor/bin/phpunit
```

The current test suite contains 222 tests and 239 assertions.

## Project Structure

```text
NL-Tools/
├── src/
│   ├── Btw.php
│   ├── Feestdagen.php
│   ├── Iban.php
│   ├── Kenteken.php
│   ├── Postcode.php
│   └── Telefoonnummer.php
├── tests/
│   ├── BtwTest.php
│   ├── FeestdagenTest.php
│   ├── IbanTest.php
│   ├── KentekenTest.php
│   ├── PostcodeTest.php
│   └── TelefoonnummerTest.php
├── composer.json
├── phpunit.xml
├── LICENSE
└── README.md
```

## Contributing

Contributions are welcome.

If you find a bug, have a suggestion, or want to add another Dutch utility, feel free to open an issue or submit a pull request.

Before contributing, please read the [Code of Conduct](CODE_OF_CONDUCT.md).

## Security

If you discover a security vulnerability, please do not report it through a public GitHub issue.

Please see [SECURITY.md](SECURITY.md) for information about responsible vulnerability reporting.

## License

NL-Tools is open-source software licensed under the [MIT License](LICENSE).

## Author

**Djessy van Drunen**

- GitHub: [@djessy-vd](https://github.com/djessy-vd)
- Website: [djessy.eu](https://djessy.eu)

---

If you find this package useful, consider giving the repository a star.
