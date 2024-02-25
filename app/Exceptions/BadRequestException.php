<?php

namespace App\Exceptions;

use Exception;

class BadRequestException extends Exception
{
    public function __construct(protected mixed $msg){
        parent::__construct();
    }

    public function render() {
        return response()->json(
            [
                'error' => true, 
                'message' => $this->msg,
            ], 422);    
    }
}
