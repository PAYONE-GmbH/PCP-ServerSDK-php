<?php

namespace DemoApp;

require_once __DIR__ . '/../vendor/autoload.php';

use DemoApp\Examples\CommerceCaseApiExample;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;

class DemoApp
{
    protected CommunicatorConfiguration $config;

    public function __construct()
    {
        $apiKey = getenv('API_KEY');
        if (empty($apiKey)) {
            throw new \RuntimeException('required environment variable API_KEY is not set');
        }
        $apiSecret = getenv('API_SECRET');
        if (empty($apiSecret)) {
            throw new \RuntimeException('required environment variable API_SECRET is not set');
        }
        $this->config = new CommunicatorConfiguration(
            apiKey: $apiKey,
            apiSecret: $apiSecret,
            host: CommunicatorConfiguration::getPredefinedHosts()['preprod']['url'],
        );
    }

    public function runApp(): void
    {
        $commerceCaseApiExample = new CommerceCaseApiExample($this->config);
        $commerceCaseApiExample->runPostOne();
        $commerceCaseApiExample->runGetAll();
        $commerceCaseApiExample->runGetOne();
        $commerceCaseApiExample->runUpdateOne();
    }

    public static function run(): void
    {
        $app = new DemoApp();
        $app->runApp();
    }
}
DemoApp::run();
