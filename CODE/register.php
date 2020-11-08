<!--
## Design by Teamtamweb.com
-->
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

  <script src="public/js/service.js?v=1"></script>
  
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <h3 class="navbar-brand" href="#">
      ลงทะเบียนรับการแจ้งเตือน
    </h3>
  </nav>
  <div class="container">
    <!-- Content here -->


    <div class="row">
      <div class="col-sm-12">

        <div class="card">
          <div class="card-header">
            ลงทะเบียนรับการแจ้งเตือนผ่าน LINE
          </div>
          <div class="card-body">

            <form>

              <div class="form-group">
                <label for="cid">เลขที่บัตรประชาชน 13 หลัก</label>
                <input type="text" class="form-control" id="cid" name="cid" maxlength="13">
              </div>

              <p class="alert alert-danger" role="alert">
                ** ข้าพเจ้ายินยอมให้ส่งข้อมูลข่าวสารและการแจ้งเตือน ผ่านบริการของระบบ LINE Notify **
              </p>


              <button type="button" class="btn btn-primary" onclick="Auth();">ยอมรับและลงทะเบียน</button>
            </form>

          </div>
        </div>

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