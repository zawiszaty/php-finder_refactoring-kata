<?php

declare(strict_types=1);


namespace CodelyTV\FinderKata\Algorithm;


final class PersonPairsSorter
{
    /**
     * @param PersonPairs[] $personsRepresentations
     *
     * @return PersonPairs[]
     */
    public function sortByAge(array $personsRepresentations, int $comparison): array
    {
        if ($comparison === Comparison::CLOSEST)
        {
            usort($personsRepresentations, static function (PersonPairs $representation1, PersonPairs $representation2) {
                return $representation2->hasSmallerAgeDiffThan($representation1);
            });

            return $personsRepresentations;
        }

        usort($personsRepresentations, static function (PersonPairs $representation1, PersonPairs $representation2) {
            return false === $representation2->hasSmallerAgeDiffThan($representation1);
        });

        return $personsRepresentations;
    }
}
