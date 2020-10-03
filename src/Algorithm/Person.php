<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Algorithm;

use DateTime;

final class Person
{
    /** @var string */
    private $name;

    /** @var DateTime */
    private $birthDate;

    public function __construct(string $name, DateTime $birthDate)
    {
        $this->name      = $name;
        $this->birthDate = $birthDate;
    }

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

    public function ageDiffThan(Person $person): int
    {
        return $this->birthDate->getTimestamp() - $person->getBirthDate()->getTimestamp();
    }
}
