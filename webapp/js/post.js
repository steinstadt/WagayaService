$("#submit_btn").click(function(){
  var sent = $("#post-text").val();
  var category = $("#post-category").val();
  if (!sent){
    alert("ルールを記入してください！");
    return false;
  }
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
      // ページの再読み込み
      window.location.reload(true);
    }else{
      alert("改善中. 少々お待ちください.");
    }
  })
  .fail(function(){
    alert("通信に失敗しました");
  });
})

// いいね機能の実装
function myFavorite(id){
  $.ajax({
    url: 'https://steinstadt.site/Wagaya/webapp/post/favorite.php',
    type: 'get',
    dataType: 'json',
    data: {
      id: id
    },
  })
  .done(function(response){
    if (response.data=='1'){
      // いいね成功
      var fav_id = '#fav-' + id;
      var fav_text = $(fav_id).text()
      var fav_text = parseInt(fav_text, 10);
      $(fav_id).text(fav_text + 1);
    }else{
      alert("いいねに失敗しました. 少々お待ちください.");
    }
  })
  .fail(function(){
    alert("通信に失敗しました");
  });
}

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
        document.getElementById($(elem).attr('id')).style.left = (e.clientX - move_start_x - 40) + "px";
        document.getElementById($(elem).attr('id')).style.top = (e.clientY - move_start_y - 18) + "px";
      }
    }
    // touch event
    elem.ontouchstart = function(e) {
      move_flg = "true";
      // move_start_x = e.clientX - parseInt(document.getElementById($(elem).attr('id')).style.left.replace("%",""));
      // move_start_y = e.clientY - parseInt(document.getElementById($(elem).attr('id')).style.top.replace("%",""));
      move_start_x = $('.message-area').offset().left;
      move_start_y = $('.message-area').offset().top;
    }
    elem.ontouchend = function(e) {
      move_flg = "false";
    }
    elem.ontouchmove = function(e) {
      if(move_flg == "true") {
        document.getElementById($(elem).attr('id')).style.left = (e.clientX - move_start_x - 40) + "px";
        document.getElementById($(elem).attr('id')).style.top = (e.clientY - move_start_y - 18) + "px";
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
