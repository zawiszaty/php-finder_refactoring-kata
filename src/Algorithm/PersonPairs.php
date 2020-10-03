<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Algorithm;

final class PersonPairs
{
    /** @var Person|null */
    private $person;

    /** @var Person|null */
    private $olderPerson;

    /** @var int */
    private $ageDiff;

    public function hasSmallerAgeDiffThan(PersonPairs $personRepresentation): bool
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
        $this->ageDiff = $this->olderPerson->ageDiffThan($this->person);
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

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function getOlderPerson(): ?Person
    {
        return $this->olderPerson;
    }
}
