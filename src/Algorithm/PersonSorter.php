<?php

declare(strict_types=1);


namespace CodelyTV\FinderKata\Algorithm;


final class PersonSorter
{
    /**
     * @param Person[] $persons
     *
     * @return PersonRepresentation[]
     */
    public function sortByAge(array $persons): array
    {
        $personRepresentations = [];

        foreach ($persons as $index => $person)
        {
            $count = count($persons);

            for ($j = $index + 1; $j < $count; $j++)
            {
                $personRepresentation = new PersonRepresentation();
                $nextPerson           = $persons[$j];

                if ($person->isYoungestThan($nextPerson))
                {
                    $personRepresentation->withPerson($person)->withOldestPerson($nextPerson);
                }
                else
                {
                    $personRepresentation->withPerson($nextPerson)->withOldestPerson($person);
                }
                $personRepresentation->refreshTimestampDiff();
                $personRepresentations[] = $personRepresentation;
            }
        }

        return $personRepresentations;
    }
}
