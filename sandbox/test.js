
// 投稿時のクリックイベント
$("#submit_btn").click(function() {
  var postSent = $('#sent').val();
  var category = $('#category').val();
  console.log(postSent);
  $.ajax({
    url: 'https://steinstadt.site/Wagaya/sandbox/post.php',
    type: 'get',
    dataType: 'json',
    data: {
      sent: postSent,
      category: category
    },
  })
  .done(function(response){
    if (response.data=='1'){
      console.log("投稿しました");
    }else{
      console.log("投稿に失敗しました");
    }
  })
  .fail(function(){
    console.log("通信に失敗しました");
  });
})
