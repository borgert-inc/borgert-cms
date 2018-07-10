<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => '这 :属性必须被接受。',
    'active_url'           => '这 :属性不是有效的URL。',
    'after'                => '这 :属性必须是之后的日期 :date.',
    'alpha'                => '这 :属性可能只包含字母。',
    'alpha_dash'           => '这 :属性只能包含字母，数字和短划线。',
    'alpha_num'            => '这 :属性只能包含字母和数字.',
    'array'                => '这 :属性必须是数组。',
    'before'               => '这 :属性必须是日期之前 :date.',
    'between'              => [
        'numeric' => '这 :属性必须介于 :最少与 :最大.',
        'file'    => '这 :属性必须介于 :最少与 :最大 kilobytes.',
        'string'  => '这 :属性必须介于 :最少与 :最大 characters.',
        'array'   => '这 :属性必须介于 :最少与 :最大 items.',
    ],
    'boolean'              => '这 :属性字段必须为true或false.',
    'confirmed'            => '这 :属性确认不匹配.',
    'date'                 => '这 :属性不是有效日期。',
    'date_format'          => '这 :属性与格式不匹配 :format.',
    'different'            => '这 :属性与 :其他必须是不同的。',
    'digits'               => '这 :属性必须是 :digits 数字.',
    'digits_between'       => '这 :属性必须介于 :最少与 :最大 digits.',
    'distinct'             => '这 :属性字段具有重复值.',
    'email'                => '这 :属性必须是有效的电子邮件地址。',
    'exists'               => '所选 :属性无效。',
    'filled'               => '这 :属性字段是必需的。',
    'image'                => '这 :属性必须是图像。',
    'in'                   => '所选 :属性无效。',
    'in_array'             => '这 :属性字段不存在 :other.',
    'integer'              => '这 :属性必须是整数.',
    'ip'                   => '这 :属性必须是有效的IP地址。',
    'json'                 => '这 :属性必须是有效的JSON字符串。',
    'max'                  => [
        'numeric' => '这 :属性可能不大于 :max.',
        'file'    => '这 :属性可能不大于 :max kilobytes.',
        'string'  => '这 :属性可能不大于 :max characters.',
        'array'   => '这 :属性可能不会超过 :max items.',
    ],
    'mimes'                => '这 :属性必须是文件类型的: :值.',
    'min'                  => [
        'numeric' => '这 :属性必须至少 :min.',
        'file'    => '这 :属性必须至少 :min kilobytes.',
        'string'  => '这 :属性必须至少 :min characters.',
        'array'   => '这 :属性必须至少 :min items.',
    ],
    'not_in'               => '所选 :属性无效.',
    'numeric'              => '这 :属性必须是数字。',
    'present'              => '这 :属性字段必须存在。',
    'regex'                => '这 :属性格式无效。',
    'required'             => '这 :属性字段是必需的。',
    'required_if'          => '这 :属性字段是必需的:其它 :value.',
    'required_unless'      => '这 :属性字段是必需的，除非 :其它是 :values.',
    'required_with'        => '这 :属性字段是必需的 :值存在.',
    'required_with_all'    => '这 :属性字段是必需的 :值存在.',
    'required_without'     => '这 :属性字段是必需的 :值存在.',
    'required_without_all' => '这 :属性字段是必需的 :值存在.',
    'same'                 => '这 :属性与 :其它必须匹配.',
    'size'                 => [
        'numeric' => '这 :字段必需是 :size.',
        'file'    => '这 :字段必需是 :size kilobytes.',
        'string'  => '这 :字段必需是 :size characters.',
        'array'   => '这 :属性必须包含 :size items.',
    ],
    'string'               => '这 :字段必需是字符串.',
    'timezone'             => '这 :字段必需是有效的区域.',
    'unique'               => '这 :属性已被采用.',
    'url'                  => '这 :属性格式无效。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => '定制消息',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
