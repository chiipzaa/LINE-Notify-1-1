function Auth() {
                      
  var cid = $('#cid').val();
  if(cid == '' || cid.length < '13'){

    Swal.fire({
              icon: 'error',
              title: 'กรุณากรอกเลขบัตรประชาชน',
              showConfirmButton: true
            });

  }else{
  
  var senddata = btoa(cid);
  var URL = 'https://notify-bot.line.me/oauth/authorize?';
  URL += 'response_type=code';
  URL += '&client_id=<<EDIT>>'; // ID LINE client_id
  URL += '&redirect_uri=<<EDIT>>'; //ถ้า Login แล้ว เลือกกลุ่มหรือตัวเอง ให้กลับมาหน้านี้
  URL += '&scope=notify';
  URL += '&state='+senddata; //กำหนด user หรือ อะไรก็ได้ที่สามารถบอกถึงว่าเป็น user ในระบบ internal
  window.location.href = URL;
  }
}
