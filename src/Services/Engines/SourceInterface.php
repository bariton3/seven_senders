<?php


namespace App\Services\Engines;


/**
 * Interface SourceInterface
 * @package App\Services\Engines
 */
interface SourceInterface
{
    /**
     * @param $fileSource string
     * @param $type string
     * @param $format string
     * @return mixed
     */
    public function getData($fileSource, $type, $format);
}
