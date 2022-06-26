$(document).ready(function () {
    $("#del_acc").click(function(){
        deleteProfile();
    });
});

function deleteProfile() {
    var sessionUID = $("#session_uid").html();
    console.log(sessionUID);
   $.ajax({
        type: "GET",
        url: "../../backend/serviceHandler.php",
        cache: false,
        data: {method: "deleteProfile", param: sessionUID},
        dataType: "json",
        success: function (response) {
            console.log("---delAcc---");
            console.log(response);
            window.location.href = '../php/logout.php';
        },
        error: function(xhr, textStatus, error) {
            console.log('status: ' + textStatus);
            console.log(xhr.responseText + " / " + xhr.status);
            //showError('an unknown error occurred while trying to fetch the feed: ' + xhr.status);

        }
    }); 
}