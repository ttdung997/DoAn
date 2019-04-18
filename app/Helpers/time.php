<?php

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
