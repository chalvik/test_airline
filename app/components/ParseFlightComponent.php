<?php
namespace app\components;

use app\models\SegmentModel;
use Ds\Map;
use yii\base\BaseObject;

/**
 *
 */
class ParseFlightComponent extends BaseObject
{
    /** @var $_data array */
    private $_data;

    /**
     * @param $data
     * @param array $config
     */
    public function __construct($data, array $config = [])
    {
       $this->setData($data);
       parent::__construct($config);
    }

    /**
     * @return Map
     */
    public function parse():Map
    {
        $map = new Map();
       foreach ($this->_data  as $segment) {
           $key = strtotime($segment->Departure['Date'].' '.$segment->Departure['Time']);
           $map->put($key,$segment);
       }
        $map->ksort();
       return $map;
    }


    /**
     * @return array
     */
    public function getData():array
    {
        return $this->_data;
    }

    /**
     * @return array
     */
    public function setData($data):void
    {
        $this->_data = $data;
    }
}