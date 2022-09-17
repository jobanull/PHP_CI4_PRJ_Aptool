<?php

// require_once __DIR__ . '/vendor/autoload.php';

class Recipt extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $mpdf = new \Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();
    }
}