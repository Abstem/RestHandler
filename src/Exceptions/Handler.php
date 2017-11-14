<?php
/**
 * Copyright (c) XFind - 2017. Todos os direitos reservados.
 * Criado por: Reginaldo Junior
 * Email: reginaldo.junior696@gmail.com
 * Data: 14/11/2017
 * Hora: 19:6:3
 */

namespace Abstem\RestHandler\Exceptions;

use Abstem\RestHandler\Traits\RenderHandler;
use Illuminate\Foundation\Exceptions\Handler as BaseHandler;

abstract class ExceptionHandler extends BaseHandler
{
    use RenderHandler;

    /**
     * All the Custom Handlers
     * @var array
     */
    protected $handlers = [
//        'App\Exceptions\ExampleException' => 'App\Handlers\ExampleHandler'
    ];
}