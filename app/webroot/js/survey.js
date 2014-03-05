var openPopup = function (survey_id) {
    var d = "/surveys/view?survey_id="+survey_id;
    var popup = window.open(d, "_blank", "height=550,width=680,left=0, top=0", "resizable=yes", "scrollbars=no", "toolbar=no", "status=no");
    if (popup === null) {
    	alert('You need to allow browser to open popup to view survey result');
    }
    popup.focus();
//    return popup;
}