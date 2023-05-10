<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

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

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {

        if ($exception instanceof UnauthorizedHttpException) {
            $preException = $exception->getPrevious();
            if ($preException instanceof
                          \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['status' => '2' ,'message' => 'Token Expired']);
            } else if ($preException instanceof
                          \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['status' => '2' ,'message' => 'Invalid Token']);
            } else if ($preException instanceof
                     \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
                 return response()->json(['status' => '2' ,'message' => 'Token Blacklisted']);
           }
           if ($exception->getMessage() === 'Token not provided') {
               return response()->json(['status' => '2' ,'message' => 'Token Not Provided']);
           }
           if ($exception->getMessage() === 'User not found') {
               return response()->json(['status' => '2' ,'message' => 'User Not Found']);
           }
           if ($exception->getMessage() === 'A token is required') {
               return response()->json(['status' => '2' ,'message' => 'Token is required']);
           }
           if ($exception->getMessage() === 'Token Signature could not be verified') {
               return response()->json(['status' => '2' ,'message' => 'Token is not correct']);
           }
        }

        try {
            \Log::channel('custom-errorlog')->error('FROM IP :'. $_SERVER['REMOTE_ADDR'] ?? 'NO IP FOUND' );
            \Log::channel('custom-errorlog')->error(URL::current());
            \Log::channel('custom-errorlog')->error($request);
            \Log::channel('custom-errorlog')->error($exception);
        }catch(\Throwable $e){
            \Log::channel('custom-errorlog')->error('In throwable');
            \Log::channel('custom-errorlog')->error('FROM IP :'. $_SERVER['REMOTE_ADDR'] ?? 'NO IP FOUND' );
            \Log::channel('custom-errorlog')->error(URL::current());
            \Log::channel('custom-errorlog')->error($request);
            \Log::channel('custom-errorlog')->error($e);
        }

        return parent::render($request, $exception);
    }
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
