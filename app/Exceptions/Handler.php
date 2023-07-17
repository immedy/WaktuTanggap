<?php

namespace App\Exceptions;

use Throwable;
use PDOException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Dflydev\DotAccessData\Exception\InvalidPathException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    //*untuk membuat halaman menjadi error 404
    // public function render($request, Throwable $e)
    // {
    //     if ($e instanceof ModelNotFoundException || $e instanceof PDOException){
    //         return response()->view('Erorr.404',[], 404);
    //     }
    //     return parent::render($request, $e);
    // }
}
