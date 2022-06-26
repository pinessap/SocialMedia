$(document).ready(function () {
  loadPosts();
  loadFriends2();
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
            if (response == -1) {
                event_data += '<p scope="col">No Posts to see!</p>';
            } else {
                $.each(response, function(i, p) {
                console.log(i,p.post_id, "," ,p.caption, ",", p.file_path, ",", p.uid, ",", p.datetime);
                    if (p.file_path != null){
                        var filepath = convertFilepath(p.file_path);
                    }

                    event_data += '<div><div class="homepost" id="'+ p.id +'"><a class="friendlink_feed" href="../frontend/php/showUser.php?username='+p.username+'">'+p.username+'</a></div><br><br>';
                    if (p.file_path != null){
                        event_data += '<img src="'+filepath+'" class="thumbnail"></div><br><br>';
                    }
                    event_data += '<div class="caption_feed" id="'+ p.id +'"> '+p.caption+'<span class="time">'+p.datetime+'</span></div>';              
                    event_data += '<hr>';
            });
            }
            
            $("#viewPosts").append(event_data);
        },
        error: function(xhr, textStatus, error) {
            console.log('status: ' + textStatus);
            console.log(xhr.responseText + " / " + xhr.status);
            //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

        }
    }); 
}

var first_req = 0;
var first_fr = 0;
var first_sr = 0;


function loadFriends2() {
    //console.log("test click");
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);

    if (first_fr == 0){
        first_fr = 1;
        $.ajax({
            type: "GET",
            url: "../backend/serviceHandler.php",
            cache: false,
            data: {method: "queryFriends", param: sessionUID},
            dataType: "json",
            success: function (response) {
                console.log("---loadFriends---");
                console.log(response);
                
                var event_data = '';

                if (response == -1){
                    console.log("no friends");
                    event_data += '<p id="no_fr">You have no friends.</p>'
                } else{
                    $.each(response, function(i, p) {
                        //console.log(i,p.id, "," ,p.username);
        
                        event_data += '<div class="show_fr" id="'+ p.id +'"><a class="friendlink2" href="php/showUser.php?username='+p.username+'">'+p.username+'</a></div>';
                    });
                }

                
                $("#viewFriends").append(event_data);
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
                //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

            }
        }); 
    } else{
        first_fr = 0;
    }
}