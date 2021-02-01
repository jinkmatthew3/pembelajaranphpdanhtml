$(document).ready(function(){    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function(){
        $("#trailerVideo").attr('ng-src', '');
        $("#trailerVideo").attr('src', '');
    });
});