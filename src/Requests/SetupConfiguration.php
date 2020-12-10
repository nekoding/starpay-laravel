<?php

namespace Nekoding\StarpayLaravel\Requests;

use Nekoding\StarpayLaravel\Contracts\MobileRequest;
use Nekoding\StarpayLaravel\Contracts\PCRequest;

abstract class SetupConfiguration implements PCRequest, MobileRequest
{

    const URL_PRODUCTION = "https://pay.star-pay.jp";
    const URL_DEVELOPMENT = "https://pay2.star-pay.jp";

    protected $url;

    public function __construct()
    {
        if (config('starpay-laravel.starpay.isProduction')) {
            $this->url = self::URL_PRODUCTION;
        }

        $this->url = self::URL_DEVELOPMENT;
    }

    protected abstract function getMobileEndpoint(): string;

    protected abstract function getPCEndpoint(): string;

    protected abstract function buildUp();
}
