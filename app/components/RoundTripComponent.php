<?php
namespace app\components;
use Ds\Map;

/**
 *  Find EndPoint  for flight
 */
class RoundTripComponent
{

    /**
     * Return array of object segment  path Round Trip
     * @param Map $segments
     * @return array
     */
    static public function  run(Map $segments)
    {
        $first = $segments->first()->value;

        $points = [];
        $find = false;
        foreach ($segments as $segment) {
            if ($segment->Off['Point'] === $first->Board['Point']) {
                $find = true;
                break;
            }
            $points = $segment;
        }

        return $segments  ;
    }

}