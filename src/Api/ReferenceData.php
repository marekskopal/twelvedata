<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Api\ReferenceData\AssetCatalogs;
use MarekSkopal\TwelveData\Api\ReferenceData\Discovery;
use MarekSkopal\TwelveData\Api\ReferenceData\Markets;
use MarekSkopal\TwelveData\Api\ReferenceData\SupportingMetadata;
use MarekSkopal\TwelveData\Client\ClientInterface;

readonly class ReferenceData extends TwelveDataApi
{
    public AssetCatalogs $assetCatalogs;

    public Discovery $discovery;

    public Markets $markets;

    public SupportingMetadata $supportingMetadata;

    public function __construct(ClientInterface $client)
    {
        $this->assetCatalogs = new AssetCatalogs($client);
        $this->discovery = new Discovery($client);
        $this->markets = new Markets($client);
        $this->supportingMetadata = new SupportingMetadata($client);

        parent::__construct($client);
    }
}
