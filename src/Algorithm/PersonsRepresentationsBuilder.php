<?php

declare(strict_types=1);


namespace CodelyTV\FinderKata\Algorithm;


final class PersonsRepresentationsBuilder
{
    /**
     * @param Person[] $personsCollection
     *
     * @return PersonRepresentation[]
     */
    public function buildPersonsRepresentations(array $personsCollection): array
    {
        $personsRepresentations = [];

        foreach ($personsCollection as $index => $person)
        {
            $count = count($personsCollection);

            for ($j = $index + 1; $j < $count; $j++)
            {
                $personRepresentation = new PersonRepresentation();
                $nextPerson           = $personsCollection[$j];

                if ($person->isYoungestThan($nextPerson))
                {
                    $personRepresentation = $personRepresentation->withPerson($person)->withOldestPerson($nextPerson);
                }
                else
                {
                    $personRepresentation = $personRepresentation->withPerson($nextPerson)->withOldestPerson($person);
                }
                $personsRepresentations[] = $personRepresentation;
            }
        }

        return $personsRepresentations;
    }
}
