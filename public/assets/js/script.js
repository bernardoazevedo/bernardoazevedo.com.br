$(document).ready(function(){
    let parseMarkdown = function(){
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
    }

    $('#text').ready(parseMarkdown);
    $('#text').on('keyup', parseMarkdown);
});
