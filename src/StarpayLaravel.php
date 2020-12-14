<?php

namespace Nekoding\StarpayLaravel;

use Nekoding\StarpayLaravel\Requests\SetupConfiguration;

class StarpayLaravel extends SetupConfiguration
{
    protected static $payload;

    protected $final_payload;
    protected $final_endpoint = null;

    /**
     * @param $payload
     * @return static
     */
    public static function build($payload): self
    {
        return new static($payload);
    }

    /**
     * StarpayLaravel constructor.
     * @param array|null $payload
     */
    public function __construct(array $payload = null)
    {
        parent::__construct();

        if (is_array($payload)) {
            static::$payload = http_build_query(array_merge($this->setClientIp(), $payload));
        }
    }

    /**
     * @return string
     */
    public function getMobileEndpoint(): string
    {
        return $this->url.parent::MOBILE_ENDPOINT;
    }

    /**
     * @return string
     */
    public function getPCEndpoint(): string
    {
        return $this->url.parent::PC_ENDPOINT;
    }

    /**
     * @return mixed
     */
    public function buildUp()
    {
        $url_endpoint = $this->final_endpoint ?? $this->getPCEndpoint();
        $this->final_payload = $url_endpoint.'?'.static::$payload;
    }

    /**
     * @return $this
     */
    public function mobile(): self
    {
        $this->final_endpoint = $this->getMobileEndpoint();

        return $this;
    }

    /**
     * @return mixed
     */
    public function redirect()
    {
        $this->buildUp();

        return redirect($this->final_payload);
    }
}
