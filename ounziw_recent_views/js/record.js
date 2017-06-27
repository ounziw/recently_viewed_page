$( document ).ready(function() {
    var recent_views_start = JSON.parse(localStorage.getItem('ounziw_recent_views'));
    var recent_views = [{
        url: CCM_CID,
        headertitle: document.title,
        pagetitle: ounziw_recent_views.pagetitle,
        description: ounziw_recent_views.pagedescription,
        thumbnail: ounziw_recent_views.thumbnail
    }];
    if (recent_views_start) {
        for(i=0;i<10;i++) {
            if (recent_views_start[i] && recent_views[0].url !== recent_views_start[i].url) {
                recent_views.push(recent_views_start[i]);
            }
        }
    }
    localStorage.setItem('ounziw_recent_views',JSON.stringify(recent_views));
});