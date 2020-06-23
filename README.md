# auxmoney OpentracingBundle - eMAGTechLabs/RabbitMqBundle

![release](https://github.com/auxmoney/OpentracingBundle-eMAGTechLabs-RabbitMqBundle/workflows/release/badge.svg)
![GitHub release (latest SemVer)](https://img.shields.io/github/v/release/auxmoney/OpentracingBundle-eMAGTechLabs-RabbitMqBundle)
![Travis (.org)](https://img.shields.io/travis/auxmoney/OpentracingBundle-eMAGTechLabs-RabbitMqBundle)
![Coveralls github](https://img.shields.io/coveralls/github/auxmoney/OpentracingBundle-eMAGTechLabs-RabbitMqBundle)
![Codacy Badge](https://api.codacy.com/project/badge/Grade/cf98c0ee71c249b992f673559448965b)
![Code Climate maintainability](https://img.shields.io/codeclimate/maintainability/auxmoney/OpentracingBundle-eMAGTechLabs-RabbitMqBundle)
![Scrutinizer code quality (GitHub/Bitbucket)](https://img.shields.io/scrutinizer/quality/g/auxmoney/OpentracingBundle-eMAGTechLabs-RabbitMqBundle)
![GitHub](https://img.shields.io/github/license/auxmoney/OpentracingBundle-eMAGTechLabs-RabbitMqBundle)

This bundle adds automatic tracing header propagation and spanning for [eMAGTechLabs fork of RabbitMq](https://github.com/eMAGTechLabs/RabbitMqBundle) producers 
and consumers to the [OpentracingBundle](https://github.com/auxmoney/OpentracingBundle-core).

## Installation

### Prerequisites

This bundle is only an additional plugin and should not be installed independently. See
[its documentation](https://github.com/auxmoney/OpentracingBundle-core#installation) for more information on installing the OpentracingBundle first.

### Require dependencies

After you have installed the OpentracingBundle:

  * require the dependencies:

```bash
    composer req auxmoney/opentracing-bundle-emagtechlabs-rabbitmqbundle
```

### Enable the bundle

If you are using [Symfony Flex](https://github.com/symfony/flex), you are all set!

If you are not using it, you need to manually enable the bundle:

  * add bundle to your application:

```php
    # Symfony 4+: bundles.php
    Auxmoney\OpentracingEmagtechlabsRabbitMqBundle\OpentracingEmagtechlabsRabbitMqBundle::class => ['all' => true],
```

## Configuration

No configuration is necessary, the bundle extension will automatically decorate configured consumers and producers.

## Usage

Whenever a message is produced or consumed, a span is automatically added to the existing trace. The tracing headers are automatically
propagated to the consumer with message headers.

## Development

Be sure to run

```bash
    composer run-script quality
```

every time before you push code changes. The tools run by this script are also run in the CI pipeline.
