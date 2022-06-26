var from = null, start = 0, url = "../php/chatroom.php";

$(document).ready(function () {
    setInterval(function () {
      load();
    }, 500);
    from = $("#session_uname").html();
    from_id = $("#session_uid").html();
    gid = $("#gid").html();
    $("#chat_btn").click(function (e) {
      $.post(url , {
        message: $('#message').val(),
        from: from,
        gid: gid
      });
      //console.log(1.1);
      $('#message').val('');
      return false;
    });

  });

function load(){
  //console.log(2);
  $.get(url + '?start=' + start, function(result){
    //console.log(2.2)
    if(result.items) {
       //console.log(4);
        result.items.forEach(item => {
        start = item.id;
        $('#messages').append(renderMessage(item));
       
      });
      $('#messages').animate({scrollTop: $('#messages')[0].scrollHeight});
    };
    //load();
    //console.log(5);
  });
}

function renderMessage(item) {
  //console.log(3);
  //var queryString = location.search.substring(1);
  //console.log(queryString);
  //var a = queryString.split("=") //splits at =
  //var value1 = a[0]; //"groupID"
  //var groupID = a[1]; //id
  //console.log(groupID);
  let time = new Date(item.created);
  time = `${time.getHours()}:${time.getMinutes() < 10 ? '0' : ''}${time.getMinutes()}`;
  
  if (item.gid == $("#gid").html()) {
    if(item.from_id != $("#session_uid").html()){
      return `<div class="other_msg"><p>${item.from}</p>${item.message}<span>${time}</span></div>`;
    } else {
      return `<div class="my_msg"><p>${item.from}</p>${item.message}<span>${time}</span></div>`;
    }
  }
  
  
}