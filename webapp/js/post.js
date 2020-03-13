$("#submit_btn").click(function(){
  var sent = $("#post-text").val();
  var category = $("#post-category").val();
  $.ajax({
    url: 'https://steinstadt.site/Wagaya/webapp/post/post.php',
    type: 'get',
    dataType: 'json',
    data: {
      sent: sent,
      category: category
    },
  })
  .done(function(response){
    if (response.data=='1'){
      alert("投稿しました");
    }else{
      alert("改善中. 少々お待ちください.");
    }
  })
  .fail(function(){
    alert("通信に失敗しました");
  });
})

// ランダムな整数を取得
function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

var move_flg = "";
var move_start_x = 0;
var move_start_y = 0;
// メッセージのポジション設定 & マウス移動処理
function message_position(){
  $('.message-pos').each(function(i, elem){
    let pos_left = getRandomInt(90) + '%';
    let pos_top = getRandomInt(90) + '%';
    $(elem).css('left', pos_left);
    $(elem).css('top', pos_top);

    // start drag
    elem.onmousedown = function(e) {
      move_flg = "true";
      console.log(move_flg);
      // move_start_x = e.clientX - parseInt(document.getElementById($(elem).attr('id')).style.left.replace("%",""));
      // move_start_y = e.clientY - parseInt(document.getElementById($(elem).attr('id')).style.top.replace("%",""));
      move_start_x = $('.message-area').offset().left;
      move_start_y = $('.message-area').offset().top;
    }
    // end drag
    elem.onmouseup = function(e) {
      move_flg = "false";
    }
    // dræg
    elem.onmousemove = function(e) {
      if(move_flg == "true") {
        document.getElementById($(elem).attr('id')).style.left = (e.clientX - move_start_x - 20) + "px";
        document.getElementById($(elem).attr('id')).style.top = (e.clientY - move_start_y - 20) + "px";
      }
    }
  });
}

window.onmouseup = function(e) {
  move_flg = "false";
}

// DOM構築後に実行
window.onload = function(){
  message_position()
}
