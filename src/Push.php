<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/24 0024
 * Time: 下午 9:07
 */

namespace Jzyuchen\Push;


use Jzyuchen\Push\Services\JPush;

class Push {

    protected $config;

    public function __construct(){
        $defaultServiceName = \Config::get('push.default');

        $services = \Config::get('push.services');
        foreach($services as $key => $value){
            if ($key == $defaultServiceName){
                $this->config = $value;
                break;
            }
        }
    }

    public function sendToAll($message){
        $push = new JPush($this->config);
        $push->sendToAll($message);
    }

    public function sendToDevices($devices, $message){
        $push = new JPush($this->config);
        $push->sendToDevices($devices, $message);
    }
}