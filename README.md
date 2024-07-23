# PAYONE Commerce Platform Server SDK PHP

## Introduction

The PHP SDK helps you to communicate with the PAYONE commerce platform server API. Its primary features are:

* convenient PHP wrapper around the API calls and responses:
  * marshals PHP request objects to HTTP requests
  * unmarshalls HTTP responses to PHP response objects or PHP exceptions
* handling of all the details concerning authentication
* handling of required meta data

Its use is demonstrated by an example for most calls. The examples execute a call using the provided API keys.

## Structure of this repository

This repository consists out of the following components:

1. The source code of the SDK itself: `/src` and `/lib`
2. The source code of the unit and integration tests (including the examples): `/tests`
3. The source code for demos is located `examples/*`. Make sure to run `composer install` and `composer dumb-autoload` before.

## Requirements

PHP 8.1 or above is required.

## Development

Ensure you have PHP 8.1 or higher installed. You will need [composer](https://getcomposer.org/) and [xdebug](https://xdebug.org/docs/install). An pretty version of the coverage report can will be placed in `coverage`, after running `composer run-script coverage-report`.

