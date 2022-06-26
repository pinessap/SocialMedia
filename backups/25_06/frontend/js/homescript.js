$(document).ready(function () {
  loadPosts();
});

function convertFilepath(oldfilepath){
    var str = oldfilepath.substring(3);
    console.log(str);
    return str;
}

function loadPosts() {
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);
    $.ajax({
        type: "GET",
        url: "../backend/serviceHandler.php",
        cache: false,
        data: {method: "queryPosts", param: sessionUID},
        dataType: "json",
        success: function (response) {
            console.log("---loadPosts---");
            console.log(response);
            
            var event_data = '';

            $.each(response, function(i, p) {
                console.log(i,p.post_id, "," ,p.caption, ",", p.file_path, ",", p.uid, ",", p.datetime);
                    if (p.file_path != null){
                        var filepath = convertFilepath(p.file_path);
                    }

                    event_data += '<div class="homepost" id="'+ p.id +'"><a class="friendlink" href="php/showUser.php?username='+p.username+'">'+p.username+'</a> | '+p.datetime+'<br><br>';
                    event_data += '<p scope="col">'+p.caption+'</p>';
                    if (p.file_path != null){
                        event_data += '<img src="'+filepath+'">';
                    }
                    event_data += '<hr>';
            });
            $("#homepage").append(event_data);
        },
        error: function(xhr, textStatus, error) {
            console.log('status: ' + textStatus);
            console.log(xhr.responseText + " / " + xhr.status);
            //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

        }
    }); 
}