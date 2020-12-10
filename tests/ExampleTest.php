<?php

namespace Nekoding\StarpayLaravel\Test;

use Nekoding\StarpayLaravel\StarpayLaravel;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_it_can_be_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_it_can_get_config(): void
    {
        $configuration = config('starpay-laravel.starpay');
        $this->assertEquals(null, $configuration['clientip']);
        $this->assertFalse($configuration['isProduction']);
    }

    public function test_it_return_mobile_endpoint(): void
    {
        $url = (new StarpayLaravel)->getMobileEndpoint();
        $this->assertEquals('https://pay2.star-pay.jp/site/smt/site_credit_smt.php', $url);
    }

    public function test_it_return_pc_endpoint(): void
    {
        $url = (new StarpayLaravel)->getPCEndpoint();
        $this->assertEquals('https://pay2.star-pay.jp/site/pc/site_credit_pc.php', $url);
    }
}
