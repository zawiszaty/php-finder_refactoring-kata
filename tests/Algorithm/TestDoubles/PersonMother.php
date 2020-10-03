<?php

declare(strict_types=1);

namespace CodelyTV\FinderKataTest\Algorithm\TestDoubles;

use CodelyTV\FinderKata\Algorithm\Person;
use DateTime;

final class PersonMother
{
    public static function create(string $name, DateTime $birthDate): Person
    {
        return new Person($name, $birthDate);
    }
}
