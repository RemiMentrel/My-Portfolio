<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
    protected $acf = true; // enable ACF


    public function aboutData () {
        $fields = get_fields(get_option('page_on_front'));
        $data = [];

        foreach ($fields as $key => $field) {
            $data[$key] = $field;
        }

        return $data;
    }
}
