<?php
namespace app\components;
use Ds\Map;
use DateTime;

/**
 *  Find EndPoint  for flight
 */
class EndPointComponent
{
    static public function  run(Map $segments) : Object
    {
        $point = null;
        $max_diff = 0;
        foreach ($segments as $segment) {

            $departure = new DateTime($segment->Departure['Date'].' '.$segment->Departure['Time']);
            $arrival = new DateTime($segment->Arrival['Date'].' '.$segment->Arrival['Time']);
            $diff = $arrival->format('U') - $departure->format('U');

            if ($diff > $max_diff) {
                $max_diff = $diff;
                $point = $segment;
            }
        }

        return $point;
    }

}