<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/24 0024
 * Time: 下午 9:08
 */

namespace Jzyuchen\Push\Services;

use JPush\Model as M;
use JPush\JPushClient;

class JPush {

    protected $app_key;
    protected $master_secret;

    private $client;

    public function __construct($config = []){
        $this->app_key = $config['app_key'];
        $this->master_secret = $config['master_secret'];

        $this->client = new JPushClient($this->app_key, $this->master_secret);
    }

    public function sendToAll($message){
        $this->client->push()
            ->setPlatform(M\all)
            ->setAudience(M\all)
            ->setNotification(M\notification($message))
            ->send();
    }

    public function sendToDevices($devices = [], $message){
        $this->client->push()
            ->setPlatform(M\all)
            ->setAudience(M\registration_id($devices))
            ->setNotification(M\notification($message))
            ->send();
    }
}