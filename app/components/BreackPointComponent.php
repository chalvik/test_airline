<?php
namespace app\components;
use Ds\Map;


/**
 *  Find Brear poin Flight
 */
class BreackPointComponent
{
    /**
     *  Return array breack points
     *
     * @param Map $segments
     * @return array
     */
    static public function  run(Map $segments) : array
    {
        $points = [];
        $count = $segments->count();
        for ( $i = 0; $i < $count ; $i++ ) {
            $slice = $segments->slice($i,2 )->toArray();
            if ($slice[0]->Board <> $slice[1]->Off) {
                $points[] = $slice[0];
            }
        }
        return $points;
    }


}