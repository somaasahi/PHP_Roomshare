$(function(){
  $('#login').on('click', function(){

    if($('#mail').val() === ''){
      alert('メールアドレスを入力して下さい。');
    } else if(!$('#mail').val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
      alert('正しいメールアドレスを入力して下さい。');
    }

    if($('#password').val() === ''){
      alert('パスワードを入力して下さい。');
    } else if(!$('#password').val().match(/^([a-zA-Z0-9]{8,100})$/)){
      alert('パスワードは8文字以上100文字以内の半角英数字で入力してください。');
    }
  });
});

$(function(){
  $('#register').on('click', function(){

    if($('#name').val() === ''){
      alert('氏名を入力して下さい。');
    }else if ($('#name').val().length>30){
      alert('氏名を30文字以内で入力して下さい。');
    }

    if($('#mail').val() === ''){
      alert('メールアドレスを入力して下さい。');
    } else if(!$('#mail').val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
      alert('正しいメールアドレスを入力して下さい。');
    }

    if ($('#tel').val().match(/[^0-9]+/)) {
      alert('電話番号を半角数字で入力して下さい。');
    } else if ($('#tel').val().length < 10||$('#inputTel').val().length > 11) {
      alert('正しい番号を入力してください。');
    }

    if($('#password').val() === ''){
      alert('パスワードを入力して下さい。');
    } else if(!$('#password').val().match(/^([a-zA-Z0-9]{8,100})$/)){
      alert('パスワードは8文字以上100文字以内の半角英数字で入力してください。');
    }

  });
});

$(function(){
  $('#forget').on('click', function(){

    if($('#name').val() === ''){
      alert('氏名を入力して下さい。');
    }else if ($('#name').val().length>30){
      alert('氏名を30文字以内で入力して下さい。');
    }

    if($('#mail').val() === ''){
      alert('メールアドレスを入力して下さい。');
    } else if(!$('#mail').val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
      alert('正しいメールアドレスを入力して下さい。');
    }

    if ($('#tel').val().match(/[^0-9]+/)) {
      alert('電話番号を半角数字で入力して下さい。');
    } else if ($('#tel').val().length < 10||$('#inputTel').val().length > 11) {
      alert('正しい番号を入力してください。');
    }
  });
});

$(function(){
  $('#pass_update').on('click', function(){

    if($('#password').val() === ''){
      alert('パスワードを入力して下さい。');
    } else if(!$('#password').val().match(/^([a-zA-Z0-9]{8,100})$/)){
      alert('パスワードは8文字以上100文字以内の半角英数字で入力してください。');
    }
  });
});

$(function(){
  $('#my_edit').on('click', function(){

    if($('#name').val() === ''){
      alert('氏名を入力して下さい。');
    }else if ($('#name').val().length>30){
      alert('氏名を30文字以内で入力して下さい。');
    }

    if($('#mail').val() === ''){
      alert('メールアドレスを入力して下さい。');
    } else if(!$('#mail').val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
      alert('正しいメールアドレスを入力して下さい。');
    }

    if ($('#tel').val().match(/[^0-9]+/)) {
      alert('電話番号を半角数字で入力して下さい。');
    } else if ($('#tel').val().length < 10||$('#inputTel').val().length > 11) {
      alert('正しい番号を入力してください。');
    }
  });
});

$(function(){
  $('#post').on('click', function(){

    if($('#address').val() === ''){
      alert('住所を入力して下さい。');
    }else if ($('#name').val().length>30){
      alert('住所を100文字以内で入力して下さい。');
    }

    if($('#title').val() === ''){
      alert('タイトルを入力して下さい。');
    }else if ($('#name').val().length>30){
      alert('タイトルを30文字以内で入力して下さい。');
    }

    if($('#content').val() === ''){
      alert('お問い合わせ内容を入力して下さい。');
    }else if($('#inputBody').val().length>500){
      alert('お問い合わせ内容を500文字以内で入力して下さい。');
    }
  });
});


$(function(){
  $('#contact').on('click', function(){

    if($('#content').val() === ''){
      alert('お問い合わせ内容を入力して下さい。');
    }else if($('#inputBody').val().length>250){
      alert('お問い合わせ内容を500文字以内で入力して下さい。');
    }
  });
});
