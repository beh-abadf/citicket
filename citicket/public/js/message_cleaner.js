$(document).ready(function () {
    let message = $("#message_div");
    message.queue(function () {
        message.click(function () {
            message.remove();
        });
    });
});
