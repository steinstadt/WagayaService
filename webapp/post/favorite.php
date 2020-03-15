<?php
    // Content-TypeをJSONに指定する
    header('Content-Type: application/json');

    $id = $_GET['id'];

    // connect to database
    $link = new mysqli("mysql10.onamae.ne.jp", "uilrw_steinstadt", "gooddog5!", "uilrw_wagaya_service");
    if (mysqli_connect_errno()) {
      $data = '2';
    } else {
      // 成功した時
      $query = "UPDATE post SET favorite = favorite + 1 WHERE id=?";
      $stmt = $link->prepare($query);
      $stmt->bind_param("i", $id);
      $stmt->execute(); // SQLの実行

      $data = '1';
    }

    echo json_encode(compact('data'));
 ?>
