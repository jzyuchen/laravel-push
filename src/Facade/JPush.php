<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/24 0024
 * Time: 下午 9:17
 */

namespace Jzyuchen\Push\Facade;


use Illuminate\Support\Facades\Facade;

class JPush extends Facade {

    protected static function getFacadeAccessor() { return 'push'; }
}