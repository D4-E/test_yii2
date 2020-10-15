$(document).ready(function () {
    $("#fill_data").click(function (e) {
        $('.progress').show();
        var c = 0;
        setInterval(function () {
            c += 5;
            if (c <= 1200) {
                $('.progress-bar').width(c);
            }
        }, 200);

        $.get("/user/default/fill-data", {}, function (response) {
            if (response.result) {
                $('#final_result').prop('disabled', false);
                c = 1194;
            }
        },'json');
        e.preventDefault();
    });
    $("#final_result").click(function () {
        document.location.href = "/test-two-final";
    });
});