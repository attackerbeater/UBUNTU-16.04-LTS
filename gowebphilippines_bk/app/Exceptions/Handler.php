<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
  /**
  * A list of the exception types that should not be reported.
  *
  * @var array
  */
  protected $dontReport = [
    \Illuminate\Auth\AuthenticationException::class,
    \Illuminate\Auth\Access\AuthorizationException::class,
    \Symfony\Component\HttpKernel\Exception\HttpException::class,
    \Illuminate\Database\Eloquent\ModelNotFoundException::class,
    \Illuminate\Session\TokenMismatchException::class,
    \Illuminate\Validation\ValidationException::class,
  ];
  
  /**
  * Report or log an exception.
  *
  * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
  *
  * @param  \Exception  $exception
  * @return void
  */
  public function report(Exception $exception)
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
  public function render($request, Exception $exception)
  {
    if ($exception instanceof \Symfony\Component\HttpFoundation\File\Exception\FileException) {
      // create a validator and validate to throw a new ValidationException
      return Validator::make($request->all(), [
        'upload_recieved_quotation' => 'required|file|size:5000',
        'upload_client_confirmation' => 'required|file|size:5000',
        'upload_confirmation_supplier_doc' => 'required|file|size:5000',
        'goods_received_from_client' => 'required|file|size:5000',
        'goods_sent_from_supplier' => 'required|file|size:5000',
        'upload_delivery_document' => 'required|file|size:5000',
        'invoice_received' => 'required|file|size:5000',
        ])->validate();
      }
      return parent::render($request, $exception);
    }
    
    /**
    * Convert an authentication exception into an unauthenticated response.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Illuminate\Auth\AuthenticationException  $exception
    * @return \Illuminate\Http\Response
    */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
      if ($request->expectsJson()) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
      }
      
      return redirect()->guest(route('login'));
    }
  }
