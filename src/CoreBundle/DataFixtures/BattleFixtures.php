<?php

namespace CoreBundle\DataFixtures\ORM;

use NorseDigital\Symfony\RestBundle\Fixture\AbstractDataFixtures;

abstract class BattleFixtures extends AbstractDataFixtures
{
    protected function getPathToData() : string
    {
        return __DIR__.'/_data/';
    }
}
