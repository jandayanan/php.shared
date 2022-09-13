<?php

namespace Shared\BaseClasses;

use Illuminate\Auth\AuthenticationException;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Shared\Traits\Instances\Response;

abstract class LaravelException extends ExceptionHandler
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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Report or log an exception.
         */
        $this->reportable(function (Throwable $e) {
            //
        });

        /**
         * Render an exception into an HTTP response.
         *
         * @param  \Throwable  $exception
         * @return \Illuminate\Http\Response
         */
        $this->renderable(function (Throwable $exception) {
            if($exception instanceof AuthenticationException){
                return response()->json(
                    Response::respond([
                        "code" => 401,
                        "message" => "Unauthorized action.",
                    ])
                );
            }

            if ($this->isHttpException($exception)) {
                $statusCode = $exception->getStatusCode();

                switch ($statusCode) {

                    case '404':
                        $code = 404;
                        $message = "404 not found.";
                        break;

                    case '405':
                        $code = 405;
                        $message = "Method not allowed.";
                        break;

                    default:
                        $code = 500;
                        $message = "Server Error.";

                }

                return response()->json(
                    Response::respond([
                        "code" => $code,
                        "message" => $message,
                        "data" => [
                            "exception" => $exception->getMessage (),
                        ]
                    ])
                );

            }

            return response()->json(
                Response::respond([
                    "code" => $exception->getCode(),
                    "message" => $exception->getMessage(),
                ])
            );

        });

    }
}
