<?php
/**
 * Created by PhpStorm
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/3/18
 */

namespace App\Http\Admin\Validate;


use Hyperf\HttpServer\Contract\RequestInterface;
use App\Exception\SystemErrorException;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;

abstract class AbstractValidate
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
     * @Inject()
     * @var ValidatorFactoryInterface
     */
    protected $ValidationFactory;

    /**
     * @Inject
     * @var RequestInterface
     */
    protected $Request;

    /**
     * 验证.
     */
    public function goCheck(): void
    {
        // 合并场景扩展验证
        $validator = $this->validationFactory->make(
            $this->Request->all(),
            $this->rules,
            $this->messages()
        );
        if ($validator->fails()){
            $errorMessage = $validator->errors()->first();
        }
    }

    /**
     * 定义验证的规则
     */
    abstract protected function rules() : array;

    /**
     * 定义消息
     */
    abstract protected function messages(): array;

    /**
     *  场景名
     */
    public function scene($crene_name)
    {
        var_dump($crene_name);
//        $result_rules = [];
//        if (!array_key_exists($crene_name, $this->scene)) {
//            throw new SystemErrorException('没这个场景验证');
//        }
//        // 收集验证规则
//        foreach($this->scene[$crene_name] as $rule_name) {
//            if (array_key_exists($rule_name, $this->rules())) {
//                $result_rules[$rule_name] = $this->rules[$rule_name];
//            }
//        }
//        if (count($result_rules) > 0) {
//            $this->rules = $result_rules;
//        }
//        // 载入指定场景下字段的附加验证规则
//        $scenes = $this->sceneExtendRules();
//        if (array_key_exists($crene_name, $scenes) &&  count($scenes[$crene_name]) > 0) {
//            foreach($scenes[$crene_name] as $field => $rule) {
//                if(array_key_exists($field, $this->rules)) {
//                    $this->rules[$field][] = $rule;
//                }
//            }
//
//        }
        return $this;
    }


    /**
     * 场景附加验证
     */
    public function sceneExtendRules() : array
    {
        return [];
    }
}