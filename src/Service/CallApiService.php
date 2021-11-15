<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://firstlight.newworldstatus.com/ext/v1/worlds/caelum',
            ['auth_bearer' => 'FIRSTLIGHTv4.v4.local.DNJILuSmcsEwqjwV3d-en9kKt1o1-TLct_wABEKp66ei0lG7VrJ61fiU1gdLVOmyu6mtZNHId22XSX1d5LPm1OFmZ_5hINSjVJ5qw3dDdBA3G5g6MvPQRxH_ttbQT2BlM9Q49bDFktK_5pZYOCXq9H2KYBMV9e1A271E_IFN0umhasdVoqkTv1fxADo9fctL94nlsIp1HSMDNMYrde633UGP4lc35rj40OyY-YAKzw4xeZyy5wYzEKcfvezWP9TIXLBgJmMDfpSDNa7adq5-tgTbha1s-Q'],
        );

        return $response->toArray();
    }
}