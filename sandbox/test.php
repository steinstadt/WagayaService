<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHPテスト</title>
  </head>
  <body>
    <h4>テスト実行画面</h4>
    <?php

      $link = new mysqli("mysql10.onamae.ne.jp", "uilrw_steinstadt", "gooddog5!", "uilrw_wagaya_service");
      if (mysqli_connect_errno()) {
        die("データベースに接続できません:" . mysqli_error() . "\n");
      } else {
        print("データベースの接続に成功しました。\n");
      }

      // 現在のデータベースを確認します。
      current_database($link);

      // データベースの検索結果を表示する
      $query = "SELECT p.id, p.sent, c.name FROM post p, category c WHERE p.category=c.id";
      $result = $link->query($query);
      print('<table>');
      print('<tr><th>id</th><th>sentence</th><th>category</th></tr>');
      while ($row = $result->fetch_assoc()){
        print('<tr>');
        print('<td>'.$row['id'].'</td>');
        print('<td>'.$row['sent'].'</td>');
        print('<td>'.$row['name'].'</td>');
        print('</tr>');
      }
      print('</table>');
      $result->close();// 結果セットの解放

      // 接続を閉じます
      $link->close();

      // 現在の現在のデータベース名を返す関数です。
      function current_database($link)
      {
          if ($result = $link->query("SELECT DATABASE()")) {
              $row = $result->fetch_row();
              printf("今のデータベースは %s です\n", $row[0]);
              $result->close();
          }
      }
     ?>

     <div class="data-input">
       <h4>データ入力テスト</h4>
       <label>我が家のルール</label>
       <input type="text" name="sent" value="" placeholder="入力してください">

       <button id="submit_btn" type="button">
         投稿
       </button>
     </div>

     <script type="text/javascript" src="./jquery-3.4.1.min.js"></script>
     <script type="text/javascript" src="./test.js"></script>

  </body>
</html>
