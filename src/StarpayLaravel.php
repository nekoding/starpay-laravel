<?php

namespace Nekoding\StarpayLaravel;

use Nekoding\StarpayLaravel\Requests\SetupConfiguration;

class StarpayLaravel extends SetupConfiguration
{

    protected static $payload;

    protected $final_payload;
    protected $final_endpoint = null;

    public static function build($payload): self
    {
        return new static($payload);
    }

    public function __construct(array $payload = null)
    {
        parent::__construct();

        if (is_array($payload)) {
            static::$payload = http_build_query($payload);
        }
    }

    public function getMobileEndpoint(): string
    {
        return $this->url . parent::MOBILE_ENDPOINT;
    }

    public function getPCEndpoint(): string
    {
        return $this->url . parent::PC_ENDPOINT;
    }

    public function buildUp()
    {
        $url_endpoint = $this->final_endpoint ?? $this->getPCEndpoint();
        $this->final_payload = $url_endpoint . "?" . static::$payload;
    }

    public function mobile()
    {
        $this->final_endpoint = $this->getMobileEndpoint();
        return $this;
    }

    public function send()
    {
        $this->buildUp();
        return redirect($this->final_payload);
    }
}
