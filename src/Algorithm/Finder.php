<?php

declare(strict_types=1);

namespace CodelyTV\FinderKata\Algorithm;

final class Finder
{
    /** @var Person[] */
    private $personsCollection;
    /** @var PersonSorter */
    private $personSorter;
    /** @var PersonsRepresentationsBuilder */
    private $personsRepresentationsBuilder;

    public function __construct(array $personsCollection)
    {
        $this->personsCollection             = $personsCollection;
        $this->personSorter                  = new PersonSorter();
        $this->personsRepresentationsBuilder = new PersonsRepresentationsBuilder();
    }

    public function find(int $comparison): PersonRepresentation
    {
        $personsRepresentations = $this->personsRepresentationsBuilder->buildPersonsRepresentations($this->personsCollection);

        if (count($personsRepresentations) < 1)
        {
            return new PersonRepresentation();
        }

        return $this->getPersonRepresentationByComparison($personsRepresentations, $comparison);
    }

    /** @param PersonRepresentation[] $personRepresentations */
    protected function getPersonRepresentationByComparison(array $personRepresentations, int $comparison): PersonRepresentation
    {
        $personRepresentations = $this->personSorter->sortByAge($personRepresentations, $comparison);

        return $personRepresentations[0];
    }
}
