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

$(document).ready(function(){
    let showSearchResult = function(contentsArray){
        let resultsDiv = $('#search-results');
        let html       = '';

        if(contentsArray.error){
            html = `<div class="search-error">${contentsArray.error} &#129488</div>`;
        }
        else if(contentsArray.length == 0) {
            html = `<div class="search-empty text-gray-800">Ops... Não encontramos nada com esses termos &#129488</div>`;
        }
        else{
            html = '<ul>';
            contentsArray.forEach(element => {
                html += `<li><a href="/content/${element.title}">${element.title}</a></li>`
            });
            html += '</ul>';
        }

        resultsDiv.html(html);
        resultsDiv.removeClass('hidden');
    }

    let searchContents = function(){
        let searchTerm = $('#search-input').val();

        $.ajax({
            url: '/searchContents',
            type: 'GET',
            data:{
                searchTerm: searchTerm
            },
            success: function(contentsArray){
                showSearchResult(contentsArray)
            },
            error: function(){

            }
        });
    }

    $('#search-input').on('keyup', searchContents);

    $('body').click((event) => {
        if (event.target.id != 'search-results' && !$(event.target).closest('#search-results').length) {
            $('#search-results').addClass('hidden');
        }
      });
});
