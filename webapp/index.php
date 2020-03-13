<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="shortcut icon" href="/Wagaya/webapp/image/icon/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="/Wagaya/webapp/image/icon/favicon.ico" type="image/vnd.microsoft.icon">
    <title>我が家のルール</title>
  </head>
  <body>

    <div class="web-content">

      <div class="display-area">
        <div id="display-name">
          <h2 style="color:white;">我が家のルールを共有しよう！</h2>
        </div>
        <div id="display-set">
          <div class="display-canvas">
            <h2>みんなの投稿</h2>
            <div class="message-area">
              <?php

                $link = new mysqli("mysql10.onamae.ne.jp", "uilrw_steinstadt", "gooddog5!", "uilrw_wagaya_service");
                if (mysqli_connect_errno()) {
                  die("データベースに接続できません:" . mysqli_error() . "\n");
                }

                // データベースの検索結果を表示する
                $query = "SELECT p.id, p.sent, p.favorite, p.surprise, p.client_time, c.name FROM post p, category c WHERE p.category=c.id";
                $result = $link->query($query);
                while ($row = $result->fetch_assoc()){
                  print('<div id=message-part'.$row['id'].'>'); // message-part
                  print('<div class=message-sent>'.$row['sent'].'</div>'); // message-sent
                  print('<div class=message-attr>'); // message-attr
                  print($row['name'].' '.$row['favorite'].' '.$row['surprise'].' '.$row['client_time']);
                  print('</div>');
                  print('</div>');
                }
              ?>
            </div>
          </div>
        </div>
      </div>

      <div class="post-area">
        <div id="input-area">
          <div id="post-name">
            <h3>我が家のルールを投稿する</h3>
          </div>
          <div id="post-input" style="height:70%;">
            <table style="width: 100%; height: 100%;">
              <tr>
                <td align="right"><label>我が家のルール</label></td>
                <td><input type="text" id="post-text" placeholder="あなたのルールを教えて！"></td>
              </tr>
              <tr>
                <td align="right"><label>カテゴリ</label></td>
                <td>
                  <select id="post-category">
                    <option value=3>食事</option>
                    <option value=4>お出かけ</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td align="right">
                  <button id="submit_btn" type="button">
                    投稿
                  </button>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div id="help-area">
          <h3>使い方</h3>
          <p>
            「このルールって私たちの家庭だけ？」と思うような我が家のルールを共有しましょう！
          </p>
          <img src="image/family.png" alt="">
        </div>
      </div>

    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/post.js"></script>

  </body>
</html>
