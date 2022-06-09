$(document).ready(function () {
    getFID();
});
  
  function getFID() {
    var username = $("#fr_username").html();
      console.log(username);

      $.ajax({
        type: "GET",
        url: "../../backend/serviceHandler.php",
        cache: false,
        data: {method: "getID", param: username},
        dataType: "json",
        success: function (response) {
            console.log("---getFID---");
            console.log(response);
            $.each(response, function(i, p) {
                $fid = p.id;
                console.log($fid);
                checkFriend($fid);
            });

        },
        error: function(xhr, textStatus, error) {
            console.log('status: ' + textStatus);
            console.log(xhr.responseText + " / " + xhr.status);
            //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

        }
    }); 
    
  }

  function checkFriend(f_id) {
      var sessionUID = $("#session_uid").html();

        var data = {uid: +sessionUID, fid: f_id};
        data = JSON.stringify(data);
        console.log(data);

      $.ajax({
          type: "GET",
          url: "../../backend/serviceHandler.php",
          cache: false,
          data: {method: "checkFriend", param: data},
          dataType: "json",
          success: function (response) {
              console.log("---checkFriend---");
              console.log(response);
              var friend_var;

              if (response == -1 && sessionUID != f_id){
                friend_var = -1;
              } else if (sessionUID == f_id){
                friend_var = -2;
              } else{
                  $.each(response, function(i, p) {
                      console.log(p.accepted);
                      friend_var = p.accepted;      
                  });
              }
  
              showProfile(friend_var, f_id);
              

          },
          error: function(xhr, textStatus, error) {
              console.log('status: ' + textStatus);
              console.log(xhr.responseText + " / " + xhr.status);
              //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);
  
          }
      }); 
  }

  function showProfile(friend_var, f_id) {
    var username = $("#fr_username").html();
    console.log(username);
    console.log(friend_var);

    if (friend_var == -2){
        //console.log("TEST");
        window.location.href = 'profile.php?mypage';
    } else {
        var username = $("#fr_username").html();
        console.log(username);
        console.log(friend_var);

        var event_data = '';
        var event_data1 = '';
        event_data += '<div class="user_profile" id="'+ f_id +'">'+username+'</div>';


        if (friend_var == -1 || friend_var == 0){

        if (friend_var == -1){
            event_data += '<button id="btn'+f_id+'" class="btn btn-light" type="button" onClick="sendRequest('+f_id+')">send Friend Request</button>';
            
        } else if (friend_var == 0){
            event_data += '<button id="btn'+f_id+'" class="btn btn-light" type="button" onClick="acceptRequest('+f_id+')">accept Friend Request</button>';
        } 

    } else if (friend_var == 1){
        var count = 0;
        $.ajax({
            type: "GET",
            url: "../../backend/serviceHandler.php",
            cache: false,
            data: {method: "getProfile", param: f_id},
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
                    event_data += '<div class="showprofile" id="'+ f_id +'">'+p.salutation+' '+p.name+' '+p.surname+'  </div>';
                }else if (i == 1){
                    //event_data += '<div class="showprofile" id="'+ f_id +'">'+p.pic_path+' </div>';
                    event_data += '<div class="imgcontainer"><img src="'+p.pic_path+'" alt="Avatar" class="avatar"></div>';
                } else {
                    event_data1 += '<tr>';
                    event_data1 += '<td scope="col">'+p.caption+'</td>';
                    if (p.file_path != null){
                        event_data1 += '<td scope="col"><img src="'+p.file_path+'"></td>';
                    }
                    event_data1 += '<td scope="col">'+p.datetime+'</td>';
                    event_data1 += '</tr>';
        
                }
                
                
            });
            },
            error: function(xhr, textStatus, error) {
                console.log('status: ' + textStatus);
                console.log(xhr.responseText + " / " + xhr.status);
            }
        }); 
        if (count < 3){
             event_data1 += '<p>this user has no posts</p>';
        }
    }
    console.log(event_data);
    console.log(event_data1);
    $("#friend_posts tbody").append(event_data1);
    $("#friend_profile").append(event_data);

    }

    


    
}

function sendRequest(f_id){
    var sessionUID = $("#session_uid").html();

    $("#btn"+f_id).hide(); 
    $("#btn"+f_id).remove();

    var data = {uid: +sessionUID, fid: f_id};
    data = JSON.stringify(data);
    console.log(data);

    $.ajax({
        type: "GET",
        url: "../../backend/serviceHandler.php",
        cache: false,
        data: {method: "sendRequest", param: data},
        dataType: "json",
        success: function (response) {
            console.log("---sendRequest---");
            console.log(response);

        },
        error: function(xhr, textStatus, error) {
            console.log('status: ' + textStatus);
            console.log(xhr.responseText + " / " + xhr.status);
        }
    }); 

}

function acceptRequest(f_id){
    var sessionUID = $("#session_uid").html();

    $("#btn"+f_id).hide(); 
    $("#btn"+f_id).remove();

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
            console.log("---acceptRequest---");
            console.log(response);

        },
        error: function(xhr, textStatus, error) {
            console.log('status: ' + textStatus);
            console.log(xhr.responseText + " / " + xhr.status);
        }
    }); 
    location.reload();

}