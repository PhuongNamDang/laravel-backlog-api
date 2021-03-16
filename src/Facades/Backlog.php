<?php
namespace Itigoppo\BacklogApi\Facades;

use Illuminate\Support\Facades\Facade;

class Backlog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'backlog';
    }
}
