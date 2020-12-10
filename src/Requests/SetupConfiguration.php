<?php

namespace Nekoding\StarpayLaravel\Requests;

use Nekoding\StarpayLaravel\Contracts\MobileRequest;
use Nekoding\StarpayLaravel\Contracts\PCRequest;

abstract class SetupConfiguration implements PCRequest, MobileRequest
{

    const URL_PRODUCTION = "https://pay.star-pay.jp";
    const URL_DEVELOPMENT = "https://pay2.star-pay.jp";

    protected $url;

    /**
     * SetupConfiguration constructor.
     */
    public function __construct()
    {
        if (config('starpay-laravel.starpay.isProduction')) {
            $this->url = self::URL_PRODUCTION;
        }

        $this->url = self::URL_DEVELOPMENT;
    }

    /**
     * @return string
     */
    protected abstract function getMobileEndpoint(): string;

    /**
     * @return string
     */
    protected abstract function getPCEndpoint(): string;

    /**
     * @return mixed
     */
    protected abstract function buildUp();

    /**
     * @return array
     */
    protected function setClientIp(): array
    {
        $clientip = config('starpay-laravel.starpay.clientip');
        return compact('clientip');
    }
}
