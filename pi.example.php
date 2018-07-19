<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example {

    public $return_data = '';

    public function __construct()
    {
        $this->return_data = 'Hello world!';
    }
}