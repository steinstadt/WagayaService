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
