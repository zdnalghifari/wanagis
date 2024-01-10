<?php

namespace App\DoctrineTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;

class GeographyType extends GeometryType
{
    const NAME = 'geography';

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform)
    {

        return "ST_GeogFromText('$sqlExpr')";
    }
}
