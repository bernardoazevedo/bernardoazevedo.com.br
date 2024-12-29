$(document).ready(function(){
    $('#text').on('keyup', function(){
        let markdownText = $('#text').val();

        $.ajax({
            url: '/markdownToHtml',
            type: 'GET',
            data:{
                markdownText: markdownText
            },
            success: function(htmlText){
                $('#htmlText').html(htmlText);
            },
            error: function(){

            }
        });
    });
});
