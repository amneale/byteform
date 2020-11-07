# Byteform ![tests](https://github.com/amneale/byteform/workflows/tests/badge.svg)
PHP library for parsing and formatting byte amounts

## Installing
```bash
composer require amneale/byteform
```

## Usage
### Parsing byte amounts
```php
$parser = new \Amneale\ByteForm\ByteParser();
$parser->parseBytes("1.5KB"); // int(1536)
```

### Formatting byte amounts
```php
$formatter = new \Amneale\ByteForm\ByteFormatter();
$formatter->formatBytes(1536); // "1.50KB" 
$formatter->formatBytes(1536, 1); // "1.5KB" 
```

## Contributing
### Running tests
byteform uses [phpspec](http://www.phpspec.net) to drive development

```bash
make test
```

### Fixing code style
Code style rules are defined in `.php_cs.dist`. These rules are used to automatically fix any code style discrepancies

```bash
make fmt
```