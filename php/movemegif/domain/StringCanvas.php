<?php

namespace movemegif\domain;

/**
 * @author Patrick van Bergen
 */
class StringCanvas implements Canvas
{
    /** @var  int */
    private $width;

    /** @var  int */
    private $height;

    /** @var int[] */
    private $pixels;

    /**
     * Enter this image's data as a string of indexes and a indexed color table.
     *
     * For example:
     *
     * $indexString = "
     *     1 1 2 2
     *     1 0 0 2
     *     2 2 1 1
     * ";
     *
     * $index2color = array(
     *     0 => 0xFFFFFF,
     *     1 => 0xFF0000,
     *     2 => 0x0000FF
     * )
     *
     * Each color is coded as 0x00RRGGBB (unused, red, green, blue bytes)
     *
     * @param int $width
     * @param int $height
     * @param $indexString string $pixelIndexes A whitespace separated string of color indexes.
     * @param int[] $index2color An index 2 RGB color map.
     */
    public function __construct($width, $height, $indexString, array $index2color)
    {
        $this->width = $width;
        $this->height = $height;

        $array = array();

        preg_match_all('/(\d+)/', $indexString, $matches);

        foreach ($matches[1] as $match) {

            $index = (int)$match;

            if (array_key_exists($index, $index2color)) {
                $array[] = $index2color[$index];
            } else {
#todo
            }

        }

        $this->pixels = $array;

        if (count($array) != $this->width * $this->height) {
#todo throw error
        }
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getPixels()
    {
        return $this->pixels;
    }
}