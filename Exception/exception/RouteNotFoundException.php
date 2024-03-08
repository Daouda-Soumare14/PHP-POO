<?php

namespace Exception\exception;

class RouteNotFoundException extends \Exception
{
    protected $message = "Cette route n'existe pas.";
}