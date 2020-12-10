<?php

namespace Nekoding\StarpayLaravel\Contracts;

interface MobileRequest extends RequestContract
{
    const MOBILE_ENDPOINT = "/site/smt/site_credit_smt.php";
}
