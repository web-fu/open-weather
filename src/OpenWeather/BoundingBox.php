<?php

declare(strict_types=1);

namespace WebFu\OpenWeather;

class BoundingBox
{
    /** @var float */
    private $lonLeft;
    /** @var float */
    private $latBottom;
    /** @var float */
    private $lonRight;
    /** @var float */
    private $latTop;
    /** @var int */
    private $zoom;

    /**
     * BoundingBox constructor.
     *
     * @param float $lonLeft
     * @param float $latBottom
     * @param float $lonRight
     * @param float $latTop
     * @param int   $zoom
     */
    public function __construct(float $lonLeft, float $latBottom, float $lonRight, float $latTop, int $zoom)
    {
        $this->lonLeft = $lonLeft;
        $this->latBottom = $latBottom;
        $this->lonRight = $lonRight;
        $this->latTop = $latTop;
        $this->zoom = $zoom;
    }

    /**
     * @return string
     */
    public function toQueryParam(): string
    {
        return implode(',', [
            $this->lonLeft,
            $this->latBottom,
            $this->lonRight,
            $this->latTop,
            $this->zoom,
            ]);
    }
}
