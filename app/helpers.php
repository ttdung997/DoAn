<?php

function setStatus($value)
{
    switch ($value) {
        case 0:
            echo "<span class='badge badge-pill badge-warning'>Đang chờ</span>";
            break;
        case 1:
            echo "<span class='badge badge-pill badge-success'>Đã xử lý</span>";
            break;
        default:
            return "<span class='badge badge-pill badge-danger'>Hủy bỏ</span>";
            break;
    }
}

function setActive($value)
{
    switch ($value) {
        case 0:
            echo "<span class='badge badge-pill badge-success'>Active</span>";
            break;
        default:
            return "<span class='badge badge-pill badge-danger'>Thu hồi</span>";
            break;
    }
}

function setTimeDefault($value)
{
    if ($value) {
        return $value->diffForHumans(\Carbon\Carbon::now());
    } else {
        return __('không xác định');
    }
}

function setTimeShort($value)
{
    if ($value) {
        $result = '';
        $time = $value->diffForHumans(\Carbon\Carbon::now());
        $split = explode(' ', $time);
        switch ($split[1]) {
            case __('giây'):
                return $split[0] . ' ' . __('giây');
                break;
            case __('phút'):
                return $split[0] . ' ' . __('phút');
                break;
            case __('giờ'):
                return $split[0] . ' ' . __('giờ');
                break;
            case __('ngày'):
                return $split[0] . ' ' . __('ngày');
                break;
            default:
                return $split[0] . ' ' . __('tuần');
                break;
        }
    } else {
        return __('không xác định');
    }
}

function splitCountry($value)
{
    $address = explode(' ', $value);
    $country = '';
    foreach ($address as $add) {
        $country .= $add[0];
    }

    return $country;
}

function serialNumber()
{
    return mt_rand(100000000000000000, 999999999999999999);
}
