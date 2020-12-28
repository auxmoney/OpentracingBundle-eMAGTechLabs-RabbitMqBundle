#!/bin/bash
shopt -s extglob

cd build/testproject/
composer config extra.symfony.allow-contrib true
composer require auxmoney/opentracing-bundle-emagtechlabs-rabbitmqbundle
rm -fr vendor/auxmoney/opentracing-bundle-emagtechlabs-rabbitmqbundle/*
cp -r ../../!(build|vendor) vendor/auxmoney/opentracing-bundle-emagtechlabs-rabbitmqbundle
composer dump-autoload
cd ../../
