$( document ).ready(function() {
    var recent_views_list = JSON.parse(localStorage.getItem('ounziw_recent_views'));
    $('.recent_views').each(function(index,element){
        var title = $(element).data('title');
        var defaultthumbnail = $(element).data('noimg');
        if (recent_views_list) {
            var templatename = $(element).data('template');
            var compiled = _.template($("#"+templatename).html());
            for (var i = 0; i < $(element).data('num'); i++) {
                if (recent_views_list[i] && !isNaN(recent_views_list[i]['url'])) {
                    if (recent_views_list[i]['thumbnail']) {
                        thumbnail = recent_views_list[i]['thumbnail'];
                    } else {
                        thumbnail = defaultthumbnail;
                    }
                    $(element).append(
                        compiled({
                            "title": recent_views_list[i][title],
                            "url": CCM_APPLICATION_URL + '/index.php?cID=' + parseInt(recent_views_list[i]['url']),
                            "description": recent_views_list[i]['description'],
                            "thumbnail": thumbnail
                        }));
                }
            }
        }
    });
});