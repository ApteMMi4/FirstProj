<?php

namespace Payments\Endpoint;

use Payments\Contract\EndpointInterface;

class ApiSettlepayEndpoint implements EndpointInterface
{
    public function getUrl()
    {
        return 'https://api-pay.net';
    }

    public function getMethod()
    {
        return 'POST';
    }
}
