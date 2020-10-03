<?php

declare(strict_types=1);

namespace CodelyTV\FinderKata\Algorithm;

final class Finder
{
    /** @var Person[] */
    private $personsCollection;
    /** @var PersonPairsSorter */
    private $personSorter;
    /** @var PersonsPairBuilder */
    private $personsPairBuilder;

    public function __construct(array $personsCollection)
    {
        $this->personsCollection             = $personsCollection;
        $this->personSorter                  = new PersonPairsSorter();
        $this->personsPairBuilder = new PersonsPairBuilder();
    }

    public function find(int $comparison): PersonPairs
    {
        $personsRepresentations = $this->personsPairBuilder->buildPersonsPairs($this->personsCollection);

        if (count($personsRepresentations) < 1)
        {
            return new PersonPairs();
        }

        return $this->getPersonRepresentationByComparison($personsRepresentations, $comparison);
    }

    /** @param PersonPairs[] $personRepresentations */
    protected function getPersonRepresentationByComparison(array $personRepresentations, int $comparison): PersonPairs
    {
        $personRepresentations = $this->personSorter->sortByAge($personRepresentations, $comparison);

        return $personRepresentations[0];
    }
}
