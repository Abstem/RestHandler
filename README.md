# RestHandler 

### Laravel Exception Handler For Rest Requests

If you need to render json responses in case of custom exceptions this is the perfect library for it.

## Instalation

```bash
$ composer require abstem/rest-handler
```

Next, update the exception handler base class on the App/Exceptions/Handler.php from

```php
<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    //  Your Code here
}
```

to

```php
<?php
namespace App\Exceptions;

use Exception;
use Abstem\RestHandler\Exceptions\ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $handlers = [
        'You\Custom\Exception'  =>  'Your\Custom\Handler',    
    ];
    
    //  Your Code here
}
```

Simple as that, and on the *__Yourc\Custom\Handler__* you should receive a __handle($request, $exception)__ method