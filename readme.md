Monolog NetteFramework-User Processor
======================================

[![Build Status](https://travis-ci.org/surda/monolog-nette-user-processor.svg?branch=master)](https://travis-ci.org/surda/monolog-nette-user-processor)

Adds extra data about the current user to the [Monolog](https://github.com/Seldaek/monolog) log message.

## Installation

Via Composer

``` bash
$ composer require surda/monolog-nette-user-processor
```

and add to `config.neon`

```yml
monolog:
	processors:
		- Surda\Monolog\Processor\NetteUserProcessor
```

## Usage

```php
$this->logger->addError('Error message.');
```

Message in log

```text
[2016-12-31 23:59:59] app.ERROR: Error message. [] {"nette-user":{"id":10,"loggedIn":true}}
```
