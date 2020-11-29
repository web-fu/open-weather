<?php

declare(strict_types=1);

namespace WebFu\OpenWeaver;

class CurrentWeaver extends OpenWeaver
{
    const ENDPOINT = '/weather';

    /**
     * @param array|string $searchTerms
     *
     * @return array|null
     */
    public function search($searchTerms): ?array
    {
        $searchTerms = is_array($searchTerms) ? $searchTerms : [$searchTerms];

        return $this->fetch(self::ENDPOINT, ['q' => implode(',', $searchTerms)]);
    }

    /**
     * @param int $cityId
     *
     * @return array|null
     */
    public function getByCityId(int $cityId): ?array
    {
        return $this->fetch(self::ENDPOINT, ['id' => $cityId]);
    }

    /**
     * @param float $lat
     * @param float $lon
     *
     * @return array|null
     */
    public function getByGeoCoordinates(float $lat, float $lon): ?array
    {
        return $this->fetch(self::ENDPOINT, ['lat' => $lat, 'lon' => $lon]);
    }

    /**
     * @param string $zipCode
     * @param string $countryCode
     *
     * @return array|null
     */
    public function getByZipCode(string $zipCode, string $countryCode): ?array
    {
        return $this->fetch(self::ENDPOINT, ['zip' => $zipCode.','.$countryCode]);
    }
}
