<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Exception\Handler;

use DemeterChain\C;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use Psr\Container\ContainerInterface;
use Phper666\JwtAuth\Exception\TokenValidException;

class HttpExceptionHandler extends ExceptionHandler
{
    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function __construct(
        StdoutLoggerInterface $logger,
        ContainerInterface $Container)
    {
        $this->logger = $logger;
        $this->Container = $Container;
    }

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->logger->error(sprintf('%s[%s] in %s', $throwable->getMessage(), $throwable->getLine(), $throwable->getFile()));
        $this->logger->error($throwable->getTraceAsString());

        //  token 无效
        if ($throwable instanceof TokenValidException) {
            return $response->withStatus(200)->withBody(new SwooleStream(json_encode([
                'code' => 401,
                'msg' => 'token invalided',
                'data' => [],
            ])));
        }
        return $response->withHeader("Server", "Hyperf")->withStatus(500)->withBody(new SwooleStream('Internal Server Error.'));
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
