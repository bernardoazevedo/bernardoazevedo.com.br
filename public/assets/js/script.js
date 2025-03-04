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
            html = `<div class="p-2 text-red-700 rounded-md">${contentsArray.error} &#129488</div>`;
        }
        else if(contentsArray.length == 0) {
            html = `<div class="p-2 text-gray-600 rounded-md">Ops... Não encontramos nada com esses termos &#129488</div>`;
        }
        else{
            html = '<ul>';
            contentsArray.forEach(element => {
                html += `<li class="py-1 px-2 hover:bg-gray-50 text-gray-600 hover:text-gray-900 rounded-md"><a class="block" href="/content/${element.title}">${element.title}</a></li>`
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
        if (event.target.id != 'search-results') {
            $('#search-results').addClass('hidden');
        }
      });
});
