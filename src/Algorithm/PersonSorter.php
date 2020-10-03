<?php

declare(strict_types=1);


namespace CodelyTV\FinderKata\Algorithm;


final class PersonSorter
{
    /**
     * @param PersonRepresentation[] $personsRepresentations
     *
     * @return PersonRepresentation[]
     */
    public function sortByAge(array $personsRepresentations, int $comparison): array
    {
        if ($comparison === Comparison::YOUNGEST)
        {
            usort($personsRepresentations, static function (PersonRepresentation $representation1, PersonRepresentation $representation2) {
                return $representation2->hasSmallerAgeDiffThan($representation1);
            });

            return $personsRepresentations;
        }

        usort($personsRepresentations, static function (PersonRepresentation $representation1, PersonRepresentation $representation2) {
            return false === $representation2->hasSmallerAgeDiffThan($representation1);
        });

        return $personsRepresentations;
    }
}
