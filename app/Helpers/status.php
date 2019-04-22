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
        case 2:
            echo "<span class='badge badge-pill badge-danger'>Hủy bỏ</span>";
            break;
        default:
            return "<span class='badge badge-pill badge-warning'>Yêu cầu thu hồi</span>";
            break;
    }
}

function setActive($value)
{
    switch ($value) {
        case 0:
            echo "<span class='badge badge-pill badge-success'>Active</span>";
            break;
        case 1:
            echo "<span class='badge badge-pill badge-danger'>Thu hồi</span>";
            break;
        default:
            return "<span class='badge badge-pill badge-warning'>Pending</span>";
            break;
    }
}