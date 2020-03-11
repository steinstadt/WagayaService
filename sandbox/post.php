<?php
    // Content-TypeをJSONに指定する
    header('Content-Type: application/json');

    $post_sent = $_GET['sent'];
    $category = $_GET['category'];
    // connect to database
    $link = new mysqli("mysql10.onamae.ne.jp", "uilrw_steinstadt", "gooddog5!", "uilrw_wagaya_service");
    if (mysqli_connect_errno()) {
      $data = '2';
    } else {
      // 成功した時
      $query = "INSERT INTO post(sent, category) VALUES(?, ?)";
      $stmt = $link->prepare($query);
      $stmt->bind_param("si", $post_sent, $category);
      $stmt->execute(); // SQLの実行

      $data = '1';
    }

    echo json_encode(compact('data'));
 ?>
