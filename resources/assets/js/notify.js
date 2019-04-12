$(document).ready(function() {
    var $message = $('.notify').attr('data');
    if ($('div').hasClass('success')) {
        toastr.success(
            $message,
            'Thành công!',
            {timeOut: 3000}
        )
    }
    if ($('div').hasClass('error')) {
        toastr.success(
            $message,
            'Lỗi!',
            {timeOut: 3000}
        )
    }
})
