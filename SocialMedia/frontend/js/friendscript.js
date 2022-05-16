var first_req = 0;
var first_fr = 0;
var first_sr = 0;

$(document).ready(function () {
    $("#fr_req_btn").click(function(){
        loadRequests();
    });

    $("#see_fr_btn").click(function(){
        loadFriends();
    });

    $("#search_btn").click(function(){
        searchUser();
    });
});

function loadRequests() {
    //console.log("test click");
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);

    if (first_req == 0){
        first_req = 1;
        $.ajax({
            type: "GET",
            url: "../../backend/serviceHandler.php",
            cache: false,
            data: {method: "queryRequests", param: sessionUID},
            dataType: "json",
            success: function (response) {
                console.log("---loadRequests---");
                console.log(response);
                
                var event_data = '';
    
                if (response == -1){
                    console.log("no friend requests");
                    event_data += '<p id="no_fr_req">You have no friend requests.</p>'
                } else{
                    $.each(response, function(i, p) {
                        //console.log(i,p.id, "," ,p.username);
        
                        event_data += '<div class="fr_req" id="'+ p.id +'">'+p.username+' <button class="btn btn-light" type="button" onClick="acceptFriend('+p.id+')">accept</button> <button class="btn btn-light" type="button" onClick="deleteFriend('+p.id+')">reject</button></div>';
                    });
                }
    
                
                $("#friend_request").append(event_data);
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
                //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);
    
            }
        }); 
    } else{
        first_req = 0;
        $("#no_fr_req").hide(); 
        $("#no_fr_req").remove(); 
        $(".fr_req").hide(); 
        $(".fr_req").remove(); 
    }
    
}

function acceptFriend(f_id){
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);

    //var data = "uid="+sessionUID+"&fid="+f_id;

    var data = {uid: +sessionUID, fid: f_id};
    data = JSON.stringify(data);
    console.log(data);

    $.ajax({
        type: "GET",
        url: "../../backend/serviceHandler.php",
        cache: false,
        data: {method: "acceptFriend", param: data},
        dataType: "json",
        success: function (response) {
            console.log(response);
        },
        error: function(xhr, textStatus, error) {
            console.log('status: ' + textStatus);
            console.log(xhr.responseText + " / " + xhr.status);
            //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

        }
    });  

    //$("#"+app_id).siblings().show(); 
    $("#"+f_id).hide(); 
    $("#"+f_id).remove(); 
}

function deleteFriend(f_id){
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);

    //var data = "uid="+sessionUID+"&fid="+f_id;

    var data = {uid: +sessionUID, fid: f_id};
    data = JSON.stringify(data);
    console.log(data);

    $.ajax({
        type: "GET",
        url: "../../backend/serviceHandler.php",
        cache: false,
        data: {method: "deleteFriend", param: data},
        dataType: "json",
        success: function (response) {
            console.log(response);
        },
        error: function(xhr, textStatus, error) {
            console.log('status: ' + textStatus);
            console.log(xhr.responseText + " / " + xhr.status);
            //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

        }
    });  

    //$("#"+app_id).siblings().show(); 
    $("#"+f_id).hide(); 
    $("#"+f_id).remove(); 
}

function loadFriends() {
    //console.log("test click");
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);

    if (first_fr == 0){
        first_fr = 1;
        $.ajax({
            type: "GET",
            url: "../../backend/serviceHandler.php",
            cache: false,
            data: {method: "queryFriends", param: sessionUID},
            dataType: "json",
            success: function (response) {
                console.log("---loadFrieds---");
                console.log(response);
                
                var event_data = '';

                if (response == -1){
                    console.log("no friends");
                    event_data += '<p id="no_fr">You have no friends.</p>'
                } else{
                    $.each(response, function(i, p) {
                        //console.log(i,p.id, "," ,p.username);
        
                        event_data += '<div class="show_fr" id="'+ p.id +'">'+p.username+' <button class="btn btn-light" type="button" onClick="deleteFriend('+p.id+')">remove friend</button></div>';
                    });
                }

                
                $("#see_friends").append(event_data);
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
                //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

            }
        }); 
    } else{
        first_fr = 0;
        $("#no_fr").hide(); 
        $("#no_fr").remove(); 
        $(".show_fr").hide(); 
        $(".show_fr").remove(); 
    }

}

function searchUser() {
    //console.log("test click");
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);
    var input = $("#search_user").val();

    console.log(input);
    $("#no_uname").hide(); 
    $("#no_uname").remove(); 
    $(".sr_uname").hide(); 
    $(".sr_uname").remove(); 
 
    if (first_fr == 0){
        //first_fr = 1;
        if (input != ""){
            $.ajax({
                type: "GET",
                url: "../../backend/serviceHandler.php",
                cache: false,
                data: {method: "queryUsername", param: input},
                dataType: "json",
                success: function (response) {
                    console.log("---searchUser---");
                    console.log(response);
                    
                    var event_data = '';
        
                    if (response == -1){
                        console.log("username not found");
                        event_data += '<p id="no_uname">Username not found.</p>'
                    } else{
                        $.each(response, function(i, p) {
                            //console.log(i,p.id, "," ,p.username);
                            
                            event_data += '<div class="sr_uname" id="'+ p.id +'"><a href="showUser.php?username='+p.username+'">'+p.username+'</a></div>';
                        });
                    }
        
                    
                    $("#search_friends").append(event_data);
                },
                error: function(xhr, textStatus, error) {
                    console.log('status: ' + textStatus);
                    console.log(xhr.responseText + " / " + xhr.status);
                    //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);
        
                }
            }); 
        }
    } else{
        first_fr = 0;
        $("#no_uname").hide(); 
        $("#no_uname").remove(); 
        $(".sr_uname").hide(); 
        $(".sr_uname").remove(); 
    }

    
}