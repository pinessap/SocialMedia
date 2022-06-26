$(document).ready(function () {
    showOwnProfile();
    loadFriends3();
});

function showOwnProfile() {
    var username = $("#username").html();
    console.log(username);

    var uid = $("#uid").html();
    console.log(uid);

    var event_data = '';
    var event_data1 = '';
  
    var count = 0;
    $.ajax({
        type: "GET",
        url: "../../backend/serviceHandler.php",
        cache: false,
        data: {method: "getProfile", param: uid},
        dataType: "json",
        async: false,
        success: function (response) {
            console.log("---showProfile---");
            console.log(response);
                //var event_data = '';
                
        $.each(response, function(i, p) {
            count++;
            console.log(count);
            if (i == 0){
                event_data += '<div class="showprofileName" hidden id="'+ uid +'">'+p.name+' '+p.surname+'</div>';
                }else if (i == 1){
                    //event_data += '<div class="showprofile" id="'+ f_id +'">'+p.pic_path+' </div>';
                    event_data += '<div class="profile-image"><img src="'+p.pic_path+'" alt="Avatar" class="profilePic"><div class="profile-user-name" id="'+ uid +'">'+username+'</div></div>';
                } else {

                   
                    if (p.file_path != null){
                        event_data1 += '<img src="'+p.file_path+'" class="thumbnail">';
                    }
                    event_data1 += '<br><br><div class="ownpost"><div class="caption_feed" id="'+ p.id +'"> '+p.caption+'<span class="time">'+p.datetime+'</span></div></div><hr>';
                }       
            });
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
            }
        }); 
        if (count < 3){
             event_data1 += '<p>you have no posts</p>';
        }
        console.log(event_data1);
    $("#my_posts").append(event_data1);
    $("#my_profile").append(event_data);
    }



    var first_req = 0;
    var first_fr = 0;
    var first_sr = 0;

    function loadFriends3() {
        //console.log("test click");
        var sessionUID = $("#uid").html();
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
                    console.log("---loadFriends---");
                    console.log(response);
                    
                    var event_data = '';
    
                    if (response == -1){
                        console.log("no friends");
                        event_data += '<p id="no_fr">You have no friends.</p>'
                    } else{
                        $.each(response, function(i, p) {
                            //console.log(i,p.id, "," ,p.username);
            
                            event_data += '<div class="show_fr" id="'+ p.id +'"><a class="friendlink2" href="../php/showUser.php?username='+p.username+'">'+p.username+'</a></div>';
                        });
                    }
    
                    
                    $("#friendlist").append(event_data);
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




    
