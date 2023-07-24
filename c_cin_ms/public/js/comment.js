$(document).ready(function () {
    $('form').on('submit', function (event) {
        event.preventDefault();
        var all_data = $('form').serialize();
        var temp = $("#comment_box").html();
        $.ajax(
            {
                url: '../comment',
                method: 'post',
                dataType: 'json',
                data: all_data,
                success: function (response) {
                    var par = response['data'].length - 1;
                    var trimedText = response['data'][par].body;
                    $("form").after(`<div id="comment_box" style="color:white;
                    margin-top:20px;">
                            <label>${response['data'][par].user_name}</label><br>                
                            <textarea readonly cols="85" rows="4">${trimedText}</textarea><br>                         
                    </div><br>`)
                }
            }
        )
    })
})