$( document ).ready(function() {
    var recent_views_list = JSON.parse(localStorage.getItem('ounziw_recent_views'));
    var title = 'headertitle';
    $('.recent_views').each(function(index,element){
        var listclass = $(element).data('listclass');
        listdata = $("<ul></ul>",{
            class: listclass
        });
        if (recent_views_list) {
            $(element).append(listdata);
            for(i=0;i<$(element).data('num');i++) {
                if (recent_views_list[i] && !isNaN(recent_views_list[i]['url'])) {
                    textdata = $("<a></a>",{
                        href: CCM_APPLICATION_URL + '/index.php?cID=' + parseInt(recent_views_list[i]['url']),
                        text: recent_views_list[i][title]
                    });
                    textlist = $("<li></li>").html(textdata);
                    $(element).children('ul').append(textlist);
                }
            }
        }
    });
});