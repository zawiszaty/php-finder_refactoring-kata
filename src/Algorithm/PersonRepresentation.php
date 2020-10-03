<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Algorithm;

final class PersonRepresentation
{
    /** @var Person */
    public $person;

    /** @var Person */
    public $olderPerson;

    /** @var int */
    public $ageDiff;

    public function hasSmallerAgeDiffThan(PersonRepresentation $personRepresentation): bool
    {
        return $this->ageDiff < $personRepresentation->ageDiff;
    }

    public function refreshTimestampDiff(): void
    {
        $this->ageDiff = $this->olderPerson->birthDate->getTimestamp() - $this->person->birthDate->getTimestamp();
    }

    public function withPerson(Person $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function withOldestPerson(Person $person): self
    {
        $this->olderPerson = $person;

        return $this;
    }
}
