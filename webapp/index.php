<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="icon" href="/Wagaya/webapp/image/icon/favicon.ico">
    <link rel="shortcut icon" href="https://steinstadt.site/wp-content/uploads/2020/03/family.png">
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
            <div class="message-area">
              <div>
                <span style="margin:0px; height:10%">みんなの投稿(PCではドラッグして動かせます)</span>
                <p><a href="https://steinstadt.site/Wagaya/webapp/display.php">全投稿はこちら</a></p>
              </div>
              <?php
                $link = new mysqli("mysql10.onamae.ne.jp", "uilrw_steinstadt", "gooddog5!", "uilrw_wagaya_service");
                if (mysqli_connect_errno()) {
                  die("データベースに接続できません:" . mysqli_error() . "\n");
                }

                // データベースの検索結果を表示する
                $query = "SELECT p.id, p.sent, p.favorite, c.name, c.attr FROM post p, category c WHERE p.category=c.id ORDER BY RAND() LIMIT 10";
                $result = $link->query($query);
                while ($row = $result->fetch_assoc()){
                  print('<div id=\''.$row['id'].'\' class=\'message-pos '.$row['attr'].'\'>'); // message-part
                  print('<div class=message-sent>'.$row['sent'].'</div>'); // message-sent
                  print('<div class=message-attr>'); // message-attr
                  print($row['name'].'   <button onclick=\'myFavorite('.$row['id'].')\'>いいね</button>  : <span id=\'fav-'.$row['id'].'\'>'.$row['favorite'].'</span>');
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
                    <option value=1>食事</option>
                    <option value=2>アウトドア</option>
                    <option value=3>買い物</option>
                    <option value=4>遊び</option>
                    <option value=5>行事</option>
                    <option value=6>恋愛</option>
                    <option value=8>会話</option>
                    <option value=7>その他</option>
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
