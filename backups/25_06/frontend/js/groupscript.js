var first_mk = 0;
var first_gr = 0;
var first_fr = 0;
var first_fr_gr = 0;
var first_sh_mb = 0;

$(document).ready(function () {
    $("#input_btn").click(function(){
        makeGroup();
    });

    $("#g_list_btn").click(function(){
        loadGroups();
    });

    $("#add_fr_btn").click(function(){
        loadFriends();
    });
});

function makeGroup() {
    //console.log("test click");
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);
    var input = $("#gr_name").val();

    console.log(input);
    $("#no_make_gr").hide(); 
    $("#no_make_gr").remove(); 
    $(".make_gr").hide(); 
    $(".make_gr").remove(); 

    var data = {uid: +sessionUID, name: input};
    data = JSON.stringify(data);
    console.log(data);
    if (input != ""){
        if (first_mk == 0){
        first_mk = 1;
        $.ajax({
            type: "GET",
            url: "../../backend/serviceHandler.php",
            cache: false,
            data: {method: "makeGroup", param: data},
            dataType: "json",
            success: function (response) {
                console.log("---makeGroup---");
                console.log(response);
    
                var event_data = '<p id="make_gr">Making Group successful.</p>' 
    
                
                $("#make_group").append(event_data);
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
                var event_data = '<p id="no_make_gr">Making Group failed.</p>'
                //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);
    
            }
        }); 
        } else{
            first_mk = 0;
            $("#no_make_gr").hide(); 
            $("#no_make_gr").remove(); 
            $(".make_gr").hide(); 
            $(".make_gr").remove(); 
        }
    } else{
        console.log("empty");
    }
    
    
}


function loadGroups() {
    //console.log("test click");
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);

    $("#no_gr").hide(); 
    $("#no_gr").remove(); 
    $(".show_members").hide(); 
    $(".show_members").remove(); 
    $("#group_list > div").hide(); 
    $("#group_list > div").remove(); 
    first_sh_mb = 0;


    if (first_gr == 0){
        first_gr = 1;
        $.ajax({
            type: "GET",
            url: "../../backend/serviceHandler.php",
            cache: false,
            data: {method: "queryGroups", param: sessionUID},
            dataType: "json",
            success: function (response) {
                console.log("---loadGroups---");
                console.log(response);
                
                var event_data = '';

                if (response == -1){
                    console.log("no groups");
                    event_data += '<p id="no_gr">You have no groups.</p>'
                } else{
                    $.each(response, function(i, p) {
                        //console.log(i,p.id, "," ,p.username);
                        event_data += '<div class="show_gr" id="'+ p.id +'"><a class="friendlink" href="showChat.php?groupID='+p.id+'">'+p.name+'</a><button class="btn btn-light" type="button" onClick="showMembers('+p.id+')">show members</button> <button class="btn btn-light" type="button" onClick="leaveGroup('+p.id+')">leave group</button></div>';
                    });
                }

                
                $("#group_list").append(event_data);
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
                //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

            }
        }); 
    } else{
        first_gr = 0;
        $("#no_gr").hide(); 
        $("#no_gr").remove(); 
        $(".show_gr").hide(); 
        $(".show_gr").remove(); 
    }

}
    


function showMembers(gid) {

    $("#no_gr").hide(); 
    $("#no_gr").remove(); 
    $(".show_members").hide(); 
    $(".show_members").remove(); 

    $("#"+gid).siblings().toggle(); 

    if (first_sh_mb == 0){
        first_sh_mb = 1;
        $.ajax({
            type: "GET",
            url: "../../backend/serviceHandler.php",
            cache: false,
            data: {method: "queryMembers", param: gid},
            dataType: "json",
            success: function (response) {
                console.log("---loadMembers---");
                console.log(response);
                
                var event_data = '';

                $.each(response, function(i, p) {
                    //console.log(i,p.id, "," ,p.username);
                    event_data += '<div class="show_members" id="'+ p.id +'"><a class="friendlink" href="showUser.php?username='+p.name+'">'+p.name+'</a></div>';
                        
                });
                

                
                $("#group_list").append(event_data);
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
                //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

            }
        }); 
    } else{
        first_sh_mb = 0;
        $("#no_gr").hide(); 
        $("#no_gr").remove(); 
        $(".show_members").hide(); 
        $(".show_members").remove(); 
    }

}


function leaveGroup(gid) {

    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);

    var data = {uid: +sessionUID, gid: gid};
    data = JSON.stringify(data);
    console.log(data);

    $("#no_gr").hide(); 
    $("#no_gr").remove(); 
    $(".show_members").hide(); 
    $(".show_members").remove(); 

    $("#"+gid).hide(); 
    $("#"+gid).remove(); 

    if (first_sh_mb == 0){
        first_sh_mb = 1;
        $.ajax({
            type: "GET",
            url: "../../backend/serviceHandler.php",
            cache: false,
            data: {method: "leaveGroup", param: data},
            dataType: "json",
            success: function (response) {
                console.log("---leaveGroup---");
                console.log(response);
                
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
                //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

            }
        }); 
    } else{
        first_sh_mb = 0;
        $("#no_gr").hide(); 
        $("#no_gr").remove(); 
        $(".show_members").hide(); 
        $(".show_members").remove(); 
    }
}


function loadFriends() {
    //console.log("test click");
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);
    first_fr_gr = 0;
    if (first_fr == 0){
        $("#add_friends").show(); 
        $("#add_friends > div > div").hide(); 
        $("#add_friends > div > div").remove(); 
        $(".show_fr > div").hide(); 
        $(".show_fr > div").remove(); 
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
        
                        event_data += '<div class="show_fr" id="'+ p.id +'"><a class="friendlink" href="showUser.php?username='+p.username+'">'+p.username+'</a><button class="btn btn-light" type="button" onClick="showGroups('+p.id+')">add to group</button></div>';
                    });
                }

                
                $("#add_friends").append(event_data);
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
                //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

            }
        }); 
    } else{
        //$("#add_friends").hide(); 
        first_fr = 0;

        $(".show_gr_fr").hide(); 
        $(".show_gr_fr").remove(); 

        $("#no_fr").hide(); 
        $("#no_fr").remove(); 
        $(".show_fr").hide(); 
        $(".show_fr").remove(); 

    }

}

function showGroups(fid) {
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);
    console.log(fid);

    $("#no_gr_fr").hide(); 
    $("#no_gr_fr").remove(); 
    $(".show_gr_fr").hide(); 
    $(".show_gr_fr").remove(); 

    $("#"+fid).siblings().toggle(); 

    var data = {uid: +sessionUID, fid: fid};
    data = JSON.stringify(data);
    console.log(data);


    if (first_fr_gr == 0){
        first_fr_gr = 1;
        $.ajax({
            type: "GET",
            url: "../../backend/serviceHandler.php",
            cache: false,
            data: {method: "queryGroupsOfFriend", param: data},
            dataType: "json",
            success: function (response) {
                console.log("---showGroups---");
                console.log(response);
                
                var event_data = '';

                if (response == -1){
                    console.log("no groups");
                    event_data += '<p id="no_gr_fr">There are no groups you can add this user to.</p>'
                } else{
                    $.each(response, function(i, p) {
                        //console.log(i,p.id, "," ,p.username);
                        event_data += '<div class="show_gr_fr" id="'+ p.id +'"><a class="friendlink" href="showChat.php?groupID='+p.id+'">'+p.name+'</a><button class="btn btn-light" type="button" onClick="addToGroup(\''+p.id+'\',\''+fid+'\')">add</button></div>';
                        
                    });
                }

                
                $("#add_friends").append(event_data);
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
                //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

            }
        }); 
    } else{
        first_fr_gr = 0;
        //$(".show_gr_fr").hide(); 
        //$(".show_gr_fr").remove(); 
        //$("#no_gr_fr").hide(); 
        //$("#no_gr_fr").remove(); 
 
    }
}

function addToGroup(gid, fid) {
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);

    $("#no_gr_fr").hide(); 
    $("#no_gr_fr").remove(); 
    $(".show_gr_fr").hide(); 
    $(".show_gr_fr").remove(); 

    $("#no_fr").hide(); 
    $("#no_fr").remove(); 
    $(".show_fr").hide(); 
    $(".show_fr").remove(); 

    $(".add_friends").hide(); 


    var data = {fid: fid, gid: gid};
    data = JSON.stringify(data);
    console.log(data);


        $.ajax({
            type: "GET",
            url: "../../backend/serviceHandler.php",
            cache: false,
            data: {method: "addToGroup", param: data},
            dataType: "json",
            success: function (response) {
                console.log("---addToGroup---");
                console.log(response);
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
                //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

            }
        }); 


}