<?php
namespace App\Exceptions;

use Exception;

class ProblemIdException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }

    public function render()
    {
        return response()->json([
            'error' => true,
            'message' => $this->getMessage(),
        ], 422);
    }
}
