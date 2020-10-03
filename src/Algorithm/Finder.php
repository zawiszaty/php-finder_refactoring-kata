<?php

declare(strict_types=1);

namespace CodelyTV\FinderKata\Algorithm;

final class Finder
{
    /** @var Person[] */
    private $personsCollection;
    /** @var PersonSorter */
    private $personSorter;

    public function __construct(array $personsCollection)
    {
        $this->personsCollection = $personsCollection;
        $this->personSorter      = new PersonSorter();
    }

    public function find(int $comparison): PersonRepresentation
    {
        $personRepresentations = $this->personSorter->sortByAge($this->personsCollection);

        if (count($personRepresentations) < 1)
        {
            return new PersonRepresentation();
        }

        return $this->getPersonRepresentationByComparison($personRepresentations, $comparison);
    }

    /** @param PersonRepresentation[] $personRepresentations */
    protected function getPersonRepresentationByComparison(array $personRepresentations, int $comparison): PersonRepresentation
    {
        $answer = $personRepresentations[0];

        foreach ($personRepresentations as $result)
        {
            switch ($comparison)
            {
                case Comparison::YOUNGEST:
                    if ($result->hasSmallerAgeDiffThan($answer))
                    {
                        $answer = $result;
                    }
                    break;

                case Comparison::OLDEST:
                    if (false === $result->hasSmallerAgeDiffThan($answer))
                    {
                        $answer = $result;
                    }
                    break;
            }
        }

        return $answer;
    }
}
