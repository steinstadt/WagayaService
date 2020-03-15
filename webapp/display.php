<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="shortcut icon" href="https://steinstadt.site/wp-content/uploads/2020/03/family.png">
    <link rel="icon" href="/Wagaya/webapp/image/icon/favicon.ico">
    <title>我が家のルール</title>
  </head>
  <body>
    <div id="display-name">
      <h2 style="color:white;">我が家のルールを共有しよう！</h2>
    </div>

    <div id="input-area-2">
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

    <div id="display-set-2">
      <p style="text-align:right;"><a href="https://steinstadt.site/Wagaya/webapp/">戻る</a></p>
      <div class="display-canvas">
        <?php

          $link = new mysqli("mysql10.onamae.ne.jp", "uilrw_steinstadt", "gooddog5!", "uilrw_wagaya_service");
          if (mysqli_connect_errno()) {
            die("データベースに接続できません:" . mysqli_error() . "\n");
          }

          // データベースの検索結果を表示する
          $query = "SELECT p.id, p.sent, p.favorite, p.client_time, c.name, c.attr FROM post p, category c WHERE p.category=c.id";
          $result = $link->query($query);
          print("<div id=tbl-bdr>");
          print("<table style=\"margin:0 auto\">");
          print("<tr><th>ルール</th><th style=width:15%;>カテゴリ</th><th style=width:15%;>いいね</th><th>投稿時間</th></tr>");
          while ($row = $result->fetch_assoc()){
            print("<tr>");
            print("<td>".$row['sent']."</td>");
            print('<td style=width:15%;>'.$row['name'].'</td>');
            print('<td style=width:15%;><button onclick=\'myFavorite('.$row['id'].')\'>いいね</button>  : <span id=\'fav-'.$row['id'].'\'>'.$row['favorite'].'</span></td>');
            print('<td>'.$row['client_time'].'</td>');
            print("</tr>");
          }
          print("</table>");
          print("</div>");
        ?>
      </div>
      <p style="text-align:right;"><a href="https://steinstadt.site/Wagaya/webapp/">戻る</a></p>
    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/post.js"></script>
  </body>
</html>
