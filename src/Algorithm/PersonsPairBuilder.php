<?php

declare(strict_types=1);


namespace CodelyTV\FinderKata\Algorithm;


final class PersonsPairBuilder
{
    /**
     * @param Person[] $personsCollection
     *
     * @return PersonPairs[]
     */
    public function buildPersonsPairs(array $personsCollection): array
    {
        $personsRepresentations = [];

        foreach ($personsCollection as $index => $person)
        {
            $count = count($personsCollection);

            for ($j = $index + 1; $j < $count; $j++)
            {
                $personRepresentation = new PersonPairs();
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
