<?php

namespace Nekoding\StarpayLaravel\Contracts;

interface RequestContract
{
    /**
     * @return mixed
     */
    public function send();
}
