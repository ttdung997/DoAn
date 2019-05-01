<script type="text/javascript" src="{{ asset('bower_components/jQuery/dist/jquery.slim.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/jQuery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/bootstrap4/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/bootstrap4/dist/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/Font-Awesome/js/solid.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/Font-Awesome/js/regular.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/pusher-js/dist/web/pusher.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/notify.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/toastr/toastr.min.js') }}"></script>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 3000);
</script>
