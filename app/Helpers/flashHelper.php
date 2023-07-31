<?php

namespace App\Helpers;

class flashHelper {

    public static function successResponse($message)
    {
        flash()->options([
            'timeout' => 3000,
            'position' => 'top-center',
        ])->addSuccess($message);
    }

    public static function errorResponse($message)
    {
        flash()->options([
            'timeout' => 3000,
            'position' => 'top-center',
        ])->addError($message);
    }

}