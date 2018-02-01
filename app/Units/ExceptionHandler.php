<?php

namespace Confee\Units;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\Response;
use Symfony\Component\Debug\Exception\FlattenException;

class ExceptionHandler extends Handler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];


    public function report(Exception $exception)
    {
        parent::report($exception);
    }


    protected function convertExceptionToResponse(Exception $e)
    {
       $e = FlattenException::create($e);

       $message = Response::$statusTexts[$e->getStatusCode()];
       if (config('app.debug')) {
           $message = $e->getMessage();
       }

       return \response()->json(['message' => $message], $e->getStatusCode());
    }


    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
}
