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

    'accepted' => ':attribute phải được chấp nhận.',
    'active_url' => ':attribute không phải là một URL.',
    'after' => ':attribute phải là một ngày sau ngày :date.',
    'after_or_equal' => ':attribute phải là một ngày sau đó hoặc bằng với :date.',
    'alpha' => ':attribute phải chứa các ký tự',
    'alpha_dash' => ':attribute chỉ có thể chứa chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => ':attribute chỉ có thể chứa chữ cái và số.',
    'array' => ':attribute phải là một mảng.',
    'before' => ':attribute phải là một ngày trước ngày :date.',
    'before_or_equal' => ':attribute phải là một ngày trước đó hoặc bằng với :date.',
    'between' => [
        'numeric' => ':attribute phải nằm trong khoảng :min đến :max.',
        'file' => ':attribute có kích thước nằm trong :min đến :max kilobytes.',
        'string' => ':attribute có độ dài từ :min đến :max ký tự.',
        'array' => ':attribute phải chứa :min đến :max phần tử.',
    ],
    'boolean' => 'Trường :attribute phải là đúng hoặc sai.',
    'confirmed' => ':attribute không khớp nhau.',
    'date' => ':attribute không đúng định dàng ngày tháng.',
    'date_format' => ':attribute không đúng định dạng :format.',
    'different' => ':attribute và :other phải khác nhau.',
    'digits' => ':attribute phải là :digits chữ số.',
    'digits_between' => ':attribute phải chứa :min đến :max chữ số.',
    'dimensions' => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct' => 'Trường :attribute có giá trị bị lặp lại.',
    'email' => 'Trường :attribute phải là một địa chỉ email.',
    'exists' => ':attribute được chọn không khả dụng.',
    'file' => ':attribute phải là một file.',
    'filled' => 'Trường :attribute không được để trống.',
    'gt' => [
        'numeric' => ':attribute phải có giá trị lớn hơn :value.',
        'file' => ':attribute phải có kích thước lớn hơn :value kilobytes.',
        'string' => ':attribute phải dài hơn :value ký tự.',
        'array' => ':attribute phải chứa nhiều hơn :value phần tử.',
    ],
    'gte' => [
        'numeric' => ':attribute phải có giá trị lớn hơn hoặc bằng :value.',
        'file' => ':attribute phải có kích thước lớn hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải chứa từ :value ký tự.',
        'array' => ':attribute phải chứa nhiều hoặc hơn :value phần tử.',
    ],
    'image' => ':attribute phải là hình ảnh.',
    'in' => ':attribute được chọn không khả dụng.',
    'in_array' => 'Trường :attribute không tồn tại trong :other.',
    'integer' => ':attribute phải là một số nguyên.',
    'ip' => ':attribute phải là một địa chỉ IP khả dụng.',
    'ipv4' => ':attribute phải là một địa chỉ IPv4 khả dụng.',
    'ipv6' => ':attribute phải là một địa chỉ IPv6 khả dụng.',
    'json' => ':attribute phải là một chuỗi JSON.',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file' => ':attribute phải nhỏ hơn :value kilobytes.',
        'string' => ':attribute phải nhỏ hơn :value ký tự.',
        'array' => ':attribute chứa ít hơn :value phần tử.',
    ],
    'lte' => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => ':attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải nhỏ hơn hoặc bằng :value ký tự.',
        'array' => ':attribute không thể chứa nhiều hơn :value phần tử.',
    ],
    'max' => [
        'numeric' => ':attribute không thể lớn hơn :max.',
        'file' => ':attribute không thể lớn hơn :max kilobytes.',
        'string' => ':attribute không thể lớn hơn :max ký tự.',
        'array' => ':attribute không thể chứa nhiều hơn :max phần tử.',
    ],
    'mimes' => ':attribute phải thuộc một trong các định dạng: :values.',
    'mimetypes' => ':attribute phải thuộc một trong các định dạng: :values.',
    'min' => [
        'numeric' => ':attribute tối thiểu là :min.',
        'file' => ':attribute tối thiểu là :min kilobytes.',
        'string' => ':attribute tối thiểu là :min ký tự.',
        'array' => ':attribute tối thiểu là :min phần tử.',
    ],
    'not_in' => ':attribute được chọn không khả dụng.',
    'not_regex' => ':attribute không đúng định dạng.',
    'numeric' => ':attribute phải là một số.',
    'present' => 'Trường :attribute phải được hiển thị.',
    'regex' => ':attribute không đúng định dạng.',
    'required' => 'Trường :attribute không được bỏ trống.',
    'required_if' => 'Trường :attribute là bắt buộc khi :other là :value.',
    'required_unless' => 'Trường :attribute là bắt buộc trừ khi :other là :values.',
    'required_with' => 'Trường :attribute là bắt buộc khi :values được hiển thị.',
    'required_with_all' => 'Trường :attribute là bắt buộc khi tất cả :values được hiển thị.',
    'required_without' => 'Trường :attribute là bắt buộc khi :values không được hiển thị.',
    'required_without_all' => 'Trường :attribute là bắt buộc khi không có :values nào được hiển thị.',
    'same' => 'Trường :attribute và :other phải giống nhau.',
    'size' => [
        'numeric' => 'Trường :attribute có giá trị là :size.',
        'file' => 'Trường :attribute có kích thước là :size kilobytes.',
        'string' => 'Trường :attribute phải chứa :size ký tự.',
        'array' => 'Trường :attribute phải chứa :size phần tử.',
    ],
    'string' => 'Trường :attribute phải là một chuỗi.',
    'timezone' => 'Trường :attribute phải là một múi giờ.',
    'unique' => ':attribute đã tồn tại.',
    'uploaded' => ':attribute không thể tải lên.',
    'url' => ':attribute không đúng định dạng.',

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
            'rule-name' => 'custom-message',
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
