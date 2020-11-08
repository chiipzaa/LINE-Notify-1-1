<html>

<head>
  <title>ลงทะเบียนแจ้งเตือนผ่าน LINE</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- Custom styles for this template -->
  <link href="public/css/style.css?v=1" rel="stylesheet">
  <link href="public/css/sticky-footer-navbar.css?v=1" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <h3 class="navbar-brand" href="#">
      ลงทะเบียนรับการแจ้งเตือน
    </h3>
  </nav>
  <div class="container">
    <br>
    <div class="card">
      <div class="card-body">

        <?php
  require_once "config.php";

  parse_str($_SERVER['QUERY_STRING'], $queries);

  $state = $_GET["state"];
  $state = base64_decode($state);

  $cid = $state; 
  $appId = "MIT"; 

  $fields = [
    'grant_type' => 'authorization_code',
    'code' => $queries['code'],
    'redirect_uri' => $callback_url,
    'client_id' => $client_id,
    'client_secret' => $client_secret
  ];

  try {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $res = curl_exec($ch);
    curl_close($ch);

    if ($res == false)
        throw new Exception(curl_error($ch), curl_errno($ch));

    $json = json_decode($res);


    // save token data To Database
    $query = "INSERT INTO userLine (cid,appId,accessToken, active, addwhen  ) VALUES (?,?,?, '1', NOW())"; 
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $cid, PDO::PARAM_STR);
    $stmt->bindParam(2, $appId, PDO::PARAM_STR);
    $stmt->bindParam(3, $json->access_token, PDO::PARAM_STR);
    $stmt->execute();

    echo "<p class='alert alert-success' role='alert'>
    ลงทะเบียนเชื่อมต่อ LINE Notify สำเร็จ
    </p>";
    
} catch(Exception $e) {
    throw new Exception($e->getMessage());
    var_dump($e);
}

?>

      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <span style="color: #d8d8d8;">Design by <a href="https://www.teamtamweb.com/" target="_blank"
          style="color: #d8d8d8;">TeamTamWeb X Teerasit</a></span>
    </div>
  </footer>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
</body>

</html>