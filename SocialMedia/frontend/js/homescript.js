$(document).ready(function () {
  loadPosts();
});

function loadPosts() {
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);
    $.ajax({
        type: "GET",
        url: "../../backend/serviceHandler.php",
        cache: false,
        data: {method: "queryPosts", param: sessionUID},
        dataType: "json",
        success: function (response) {
            console.log("---loadPosts---");
            console.log(response);
            
            var event_data = '';

            $.each(response, function(i, p) {
                console.log(i,p.id, "," ,p.title, ",", p.place, ",", p.expiry);

                    event_data += '<article class="list-group-item list-group-item-action" id="'+ p.id +'" onclick="showDetails(\''+p.id+'\',\''+expired+'\')"> <b>ID:</b> '+p.id+'<br><br><b>Title:</b> '+p.title+'<br><br><b>Room:</b> '+p.place+'<br><br><b>Expiry Date:</b> '+p.expiry+'</li>';
            });
            $("#apps_list").append(event_data);
        },
        error: function(xhr, textStatus, error) {
            console.log('status: ' + textStatus);
            console.log(xhr.responseText + " / " + xhr.status);
            //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

        }
}); 
}