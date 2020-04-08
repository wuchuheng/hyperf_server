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
use App\Exception\ValidationException;

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

        //  token 无效异常
        if ($throwable instanceof TokenValidException) {
            return $response->withStatus(200)->withBody(new SwooleStream(json_encode([
                'code' => 401,
                'msg' => 'token invalided',
                'data' => [],
            ])));
        }

        // 验证异常
        if ($throwable instanceof  ValidationException) {
            return $response->withStatus(200)->withBody(new SwooleStream(json_encode([
                'code' => $throwable->code,
                'msg' => $throwable->msg,
                'data' => [],
            ])));
        }
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
