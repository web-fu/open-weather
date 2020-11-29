<?php

declare(strict_types=1);

namespace WebFu\OpenWeather;

class CurrentWeather extends OpenWeather
{
    const WEATHER = '/weather';
    const RECTANGLE = '/box/city';
    const FIND = '/find';
    const GROUP = '/group';

    /**
     * @param array|string $searchTerms
     *
     * @return array|null
     */
    public function search($searchTerms): ?array
    {
        $searchTerms = is_array($searchTerms) ? $searchTerms : [$searchTerms];

        return $this->fetch(self::WEATHER, ['q' => implode(',', $searchTerms)]);
    }

    /**
     * @param int $cityId
     *
     * @return array|null
     */
    public function getByCityId(int $cityId): ?array
    {
        return $this->fetch(self::WEATHER, ['id' => $cityId]);
    }

    /**
     * @param float $lat
     * @param float $lon
     *
     * @return array|null
     */
    public function getByGeoCoordinates(float $lat, float $lon): ?array
    {
        return $this->fetch(self::WEATHER, ['lat' => $lat, 'lon' => $lon]);
    }

    /**
     * @param string $zipCode
     * @param string $countryCode
     *
     * @return array|null
     */
    public function getByZipCode(string $zipCode, string $countryCode): ?array
    {
        return $this->fetch(self::WEATHER, ['zip' => $zipCode.','.$countryCode]);
    }

    /**
     * @param BoundingBox $boundingBox
     *
     * @return array|null
     */
    public function getByRectangleArea(BoundingBox $boundingBox): ?array
    {
        return $this->fetch(self::RECTANGLE, ['bbox' => $boundingBox->toQueryParam()]);
    }

    /**
     * @param float $lat
     * @param float $lon
     * @param int   $cityCnt
     *
     * @return array|null
     */
    public function getByCircleArea(float $lat, float $lon, int $cityCnt): ?array
    {
        return $this->fetch(self::FIND, ['lat' => $lat, 'lon' => $lon, 'cnt' => $cityCnt]);
    }

    /**
     * @param int[] $cityIds
     *
     * @return array|null
     */
    public function getByCityIds(array $cityIds): ?array
    {
        return $this->fetch(self::GROUP, ['id' => implode(',', $cityIds)]);
    }
}
