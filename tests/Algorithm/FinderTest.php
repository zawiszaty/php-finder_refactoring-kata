<?php

declare(strict_types=1);

namespace CodelyTV\FinderKataTest\Algorithm;

use CodelyTV\FinderKata\Algorithm\Comparison;
use CodelyTV\FinderKata\Algorithm\Finder;
use CodelyTV\FinderKataTest\Algorithm\TestDoubles\PersonMother;
use DateTime;
use PHPUnit\Framework\TestCase;

final class FinderTest extends TestCase
{
    /**
     * @dataProvider person_pair_data_provider
     */
    public function test_person_pair_finder($list, $comparison, $person, $oldestPerson): void
    {
        $finder = new Finder($list);

        $result = $finder->find($comparison);

        self::assertEquals($person, $result->getPerson());
        self::assertEquals($oldestPerson, $result->getOlderPerson());
    }

    public function person_pair_data_provider(): array
    {
        $sue   = PersonMother::create('Sue', new DateTime("1950-01-01"));
        $greg  = PersonMother::create('Greg', new DateTime("1952-05-01"));
        $sarah = PersonMother::create('Sarah', new DateTime("1982-01-01"));
        $mike  = PersonMother::create('Mike', new DateTime("1979-01-01"));

        return [
            'should_return_empty_when_given_empty_list'  => [[], Comparison::CLOSEST, null, null],
            'should_return_empty_when_given_one_person'  => [[$sue,], Comparison::CLOSEST, null, null],
            'should_return_closest_two_for_two_people'   => [[$mike, $greg], Comparison::CLOSEST, $greg, $mike],
            'should_return_furthest_two_for_two_people'  => [[$mike, $greg], Comparison::FURTHER, $greg, $mike],
            'should_return_furthest_two_for_four_people' => [[$sue, $greg, $sarah, $mike], Comparison::FURTHER, $sue, $sarah],
            'should_return_closest_two_for_four_people'  => [[$sue, $greg, $sarah, $mike], Comparison::CLOSEST, $sue, $greg],
        ];
    }
}
