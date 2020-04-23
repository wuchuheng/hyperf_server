<?php
/**
 * Created by PhpStorm
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/3/18
 */

namespace App\Http\Admin\Validation;


use Hyperf\HttpServer\Contract\RequestInterface;
use App\Exception\SystemErrorException;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Psr\Container\ContainerInterface;
use function GuzzleHttp\default_user_agent;
use App\Exception\ValidationException;
use Hyperf\Utils\Context;
use function MongoDB\BSON\fromJSON;

abstract class AbstractValidation
    {
    /**
     * 场景组.
     * @var array
     */
    public $scene = [];

    /**
     * 规则组.
     * @var array
     */
    private $rules = [];

    /**
     * 验证消息.
     * @var array
     */
    private $messages = [];

    /**
     * @var ValidatorFactoryInterface
     */
    private $Validator;

    /**
     * @var ValidationException|mixed
     */
    private $ValidationException;

    /**
     * @var RequestInterface
     */
    private $Request;

    /**
     * 初始化配置参数.
     * AbstractValidate constructor.
     */
    public function __construct(ContainerInterface $Container)
    {
        $this->rules = $this->setRules();
        $this->scene = $this->setScene();
        $this->messages = $this->setMessages();
        $this->Validator = $Container->get(ValidatorFactoryInterface::class);
        $this->Request = $Container->get(RequestInterface::class);
    }

    /**
     * 验证场景
     * @param string $scene_name
     */
    public function scene(string $scene_name): self
    {
        $scene_rules = [];
        foreach ($this->scene[$scene_name] as $rule) {
            if (array_key_exists($rule, $this->rules)) {
                $scene_rules[$rule] = $this->rules[$rule];
            }
        }
        // 场景合并附加验证
        $extension_rules = $this->setSceneExtendRules();
        if (array_key_exists($scene_name, $extension_rules)) {
            $scene_rules = array_merge_recursive($scene_rules, $extension_rules[$scene_name]);
        }
        Context::set('permissions_rules', $scene_rules);

        return $this;
    }

    /**
     * 场景附加验证
     * 对指定的场景附加验证规则
     */
    abstract protected function setSceneExtendRules(): array;

    /**
     * 验证.
     */
    public function goCheck(): void
    {
        $ValidateResult = $this->Validator->make(
            $this->Request->all(),
            Context::get('permissions_rules'),
            $this->messages
        );
        if ($ValidateResult->fails()) {
            throw new ValidationException(array(
                'msg' => $ValidateResult->errors()->first(),
            ));
        }
    }

    /**
     * 设置规则
     */
    abstract protected function setRules(): array;

    /**
     * 设置消息
     */
    abstract protected function setMessages(): array;

    /**
     *  设置场景名
     */
    abstract protected function setScene(): array;
}
