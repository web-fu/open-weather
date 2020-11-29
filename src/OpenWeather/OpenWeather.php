<?php

declare(strict_types=1);

namespace WebFu\OpenWeather;

class OpenWeather
{
    /** @var string */
    private $apiKey;
    /** @var string */
    private $version;
    /** @var string */
    private $lang = 'en';
    /** @var string */
    private $units = 'standard';
    const BASE_URI = 'https://api.openweathermap.org';

    /**
     * OpenWeather constructor.
     *
     * @param string $apiKey
     * @param string $version
     */
    public function __construct(string $apiKey, string $version = '2.5')
    {
        $this->apiKey = $apiKey;
        $this->version = $version;
    }

    /**
     * @param string $lang
     *
     * @return OpenWeather
     */
    public function setLang(string $lang): OpenWeather
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * @param string $units
     *
     * @return OpenWeather
     */
    public function setUnits(string $units): OpenWeather
    {
        $this->units = $units;

        return $this;
    }

    /**
     * @param string $endpoint
     * @param array  $params
     *
     * @return array|null
     */
    protected function fetch(string $endpoint, array $params): ?array
    {
        $params['appid'] = $this->apiKey;
        $params['units'] = $this->units;
        $params['lang'] = $this->lang;
        $url = self::BASE_URI.'/data/'.$this->version.$endpoint.'?'.http_build_query($params);

        $json = file_get_contents($url);

        if (!$json) {
            return null;
        }

        return json_decode($json, true);
    }
}
