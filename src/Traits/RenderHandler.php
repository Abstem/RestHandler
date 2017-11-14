<?php
/**
 * Copyright (c) XFind - 2017. Todos os direitos reservados.
 * Criado por: Reginaldo Junior
 * Email: reginaldo.junior696@gmail.com
 * Data: 14/11/2017
 * Hora: 19:4:1
 */

namespace Abstem\RestHandler\Traits;

use Illuminate\Http\Request;
use Exception;

trait RenderHandler
{

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->ajax()) {
            if ($this->hasHandler($exception)) {
                return $this->handle($request, $exception);
            }
        }
        return parent::render($request, $exception);
    }

    /**
     * @param Request $request
     * @param Exception $exception
     * @return mixed
     */
    protected function handle(Request $request, Exception $exception)
    {
        $handler = $this->getHandler($exception);

        return (new $handler)->handle($request, $exception);
    }

    /**
     * @param Exception $exception
     * @return mixed
     */
    protected function getHandler(Exception $exception)
    {
        return collect($this->handlers)
            ->first(function ($handler, $e) use ($exception) {
                return $exception instanceof $e;
            });
    }

    /**
     * @param Exception $exception
     * @return bool
     */
    protected function hasHandler(Exception $exception)
    {
        return !!$this->getHandler($exception);
    }

}