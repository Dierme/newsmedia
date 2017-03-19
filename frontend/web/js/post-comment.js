/**
 * Created by kalim_000 on 3/19/2017.
 */
$(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    $('#comment-submit').click(function () {
        var path = window.location.pathname;
        var modelId = path.split('/')[2];

        if(isEmpty(modelId)){
            console.log('Something has gone wrong: can not determine ID by url');
        }

        var text = $('#comment-text').val();

        $.ajax({
            type: "POST",
            data:{'news_id':modelId, 'text':text, '_csrf': csrfToken},
            dataType:"json",
            url: "/site/post-comment",
            success: function(response)
            {
                // alert(JSON.stringify(response));
                $('#comments-list').append(response);
            },
            error: function(response){
               console.log('bad ajax response '+response.responseText);
            }
        });

    });
})

function isEmpty(val){
    return (val === undefined || val == null || val.length <= 0) ? true : false;
}