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

            </div>
          </div>
        </div>
      </div>

      <div class="post-area">
        <div id="input-area">
          <div id="post-name">
            <h3>我が家のルールを投稿する</h3>
          </div>
          <div id="post-input">
            <table style="width: 100%;">
              <tr>
                <td><label>メッセージ</label></td>
                <td><input type="text" id="post-text" placeholder="あなたのルールを教えて！"></td>
              </tr>
              <tr>
                <td><label>カテゴリ</label></td>
                <td>
                  <select id="post-category">
                    <option value=3>食事</option>
                    <option value=4>お出かけ</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
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

  </body>
</html>
