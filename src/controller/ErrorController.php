<?php
namespace controller;

use lib\Pages;

class ErrorController {

    public static function show_error404(): void {
        http_response_code(404);
        ((new Pages())->render('error404'));
    }
}
?>