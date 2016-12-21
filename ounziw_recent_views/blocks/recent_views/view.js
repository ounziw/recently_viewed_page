$( document ).ready(function() {
    var recent_views_list = JSON.parse(localStorage.getItem('ounziw_recent_views'));
    var listclass = $('.recent_views').data('listclass');
    var title = 'headertitle';
    
    listdata = $("<ul></ul>",{
        class: listclass,
    });
    if (recent_views_list) {
        $('.recent_views').append(listdata);
        for(i=0;i<$('.recent_views').data('num');i++) {
            if (recent_views_list[i] && !isNaN(recent_views_list[i]['url'])) {
                textdata = $("<a></a>",{
                    href: CCM_APPLICATION_URL + '/index.php?cID=' + parseInt(recent_views_list[i]['url']),
                    text: recent_views_list[i][title]
                });
                textlist = $("<li></li>").html(textdata);
                $('.recent_views ul').append(textlist);
            }
        }
    }
});