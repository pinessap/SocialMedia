$(document).ready(function () {
    showOwnProfile();
});

function showOwnProfile() {
    var username = $("#username").html();
    console.log(username);

    var uid = $("#uid").html();
    console.log(uid);

    var event_data = '';
    var event_data1 = '';
    event_data += '<div class="user_profile" id="'+ uid +'">'+username+'</div>';
    
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
                event_data += '<div class="showprofile" id="'+ uid +'">'+p.salutation+' '+p.name+' '+p.surname+'  </div>';
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
             event_data1 += '<p>you have no posts</p>';
        }
        console.log(event_data1);
    $("#my_posts tbody").append(event_data1);
    $("#my_profile").append(event_data);
    }


    


    
