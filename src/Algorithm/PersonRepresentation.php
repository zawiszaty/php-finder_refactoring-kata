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

    private function refreshTimestampDiff(): void
    {
        if (null === $this->olderPerson || null === $this->person)
        {
            $this->ageDiff = 0;

            return;
        }
        $this->ageDiff = $this->olderPerson->birthDate->getTimestamp() - $this->person->birthDate->getTimestamp();
    }

    public function withPerson(Person $person): self
    {
        $clone         = clone $this;
        $clone->person = $person;
        $clone->refreshTimestampDiff();

        return $clone;
    }

    public function withOldestPerson(Person $person): self
    {
        $clone              = clone $this;
        $clone->olderPerson = $person;
        $clone->refreshTimestampDiff();

        return $clone;
    }
}
