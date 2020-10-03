<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Algorithm;

use DateTime;

final class Person
{
    /** @var string */
    public $name;

    /** @var DateTime */
    public $birthDate;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function isYoungestThan(Person $person): bool
    {
        return $this->birthDate < $person->birthDate;
    }
}
