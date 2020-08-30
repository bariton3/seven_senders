<?php


namespace App\Services\Engines;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class Source
 * @package App\Services\Engines
 */
class Source implements SourceInterface
{
    public function getData($fileSource, $type, $format)
    {
        $serializer = new Serializer(
            [new ObjectNormalizer(), new ArrayDenormalizer()],
            [new XmlEncoder(),new JsonEncoder()]
        );

        return $serializer->deserialize(
            file_get_contents(__DIR__. '/../../sources/' . $fileSource),
            $type,
            $format
        );
    }

}
