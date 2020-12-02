<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
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

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            if ($exception instanceof NotFoundHttpException) {
                return response()->json([
                    'data' => new \stdClass(),
                    'message' => 'Not Found.',
                ], 401);
            }
            if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
                return response()->json([
                    'data' => new \stdClass(),
                    'message' => 'Unauthenticated ! Your session has been expired, Plese Login First.',
                ], 401);
            }

            if ($exception instanceof \Illuminate\Validation\ValidationException) {
                $transformed = [];

                foreach ($exception->errors() as $field => $message) {
                    $transformed[$field] = $message[0];
                }

                return response()->json([
                    'errors' => $transformed,
                    'message' => 'The given data was invalid.',
                ], 422);
            }

            if ($exception instanceof AccessDeniedHttpException|| $exception instanceof AuthorizationException|| $exception instanceof HttpException) {
                return response()->json([
                    'errors' => new \StdClass(),
                    'message' => $exception->getMessage(),
                ], 403);
            }

            if ($exception instanceof MethodNotAllowedHttpException || $exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
                return response()->json([
                    'errors' => new \StdClass(),
                    'message' => 'Not Found.',
                ], 404);
            }
        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated ! Your session has been expired, Plese Login First..'], 401);
        }
        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest('/login/admin');
        }
        if ($request->is('vendor') || $request->is('vendor/*')) {
            return redirect()->guest('/login/vendor');
        }
        if ($request->is('store') || $request->is('store/*')) {
            return redirect()->guest('/login/store');
        }
        return redirect()->guest(route('login'));
    }
}
