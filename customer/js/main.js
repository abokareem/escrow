//login
$('#login').on('submit', function(e) {
  e.preventDefault();

  $.ajax({
    url: './process/customer.php?login',
    type: 'POST',
    data: new FormData(this),
    contentType: false,
    processData: false,
    success: function (data) {
      if(data == "success"){
        window.location.href = "./index.php";
      }
      else if(data == "password"){
        warning('Login Error', "Incorrect password");
      }
      else if(data == "details"){
        warning('Login Error', "Incorrect details");
      }
      else{
        error("Error", "This rarely happen, we are looking into it<br/>Try again later")
      }
    }
  });
});

//register
$('#register').on('submit', function(e) {
  e.preventDefault();

  $.ajax({
    url: './process/customer.php?register',
    type: 'POST',
    data: new FormData(this),
    contentType: false,
    processData: false,
    success: function (data) {
      if(data == "success"){
        window.location.href = "./login.php";
      }
      else if(data == "error"){
        warning('Error', "registration failed");
      }
      else if(data == "details"){
        warning('Error', "Username or Email address has been used");
      }
      else{
        alert(data);
        error("Error", "This rarely happen, we are looking into it<br/>Try again later")
      }
    }
  });
});

//ad bank form
$('#addBank').on('submit', function(e) {
  e.preventDefault();
  alert("clickedddd");

  $.ajax({
    url: './process/customer.php?addBank',
    type: 'POST',
    data: new FormData(this),
    contentType: false,
    processData: false,
    success: function (data) {
      if(data == "success"){
        success('Success', 'Bank Added Succssfully');
      }
      else if(data == "error"){
        warning('Error', "Please try again");
      }
      else{
        alert(data);
        error("Error", "This rarely happen, we are looking into it<br/>Try again later")
      }
    }
  });
});

//populate datatables
$(function(){
  'use strict';

  $('#datatable1').DataTable({
    responsive: true,
    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
    }
  });

  $('#datatable2').DataTable({
    responsive: true,
    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
    }
  });
});

//notifications
function error(title, msg){
  iziToast.error({
    title: title,
    message: msg,
    position: 'topCenter',
    timeout: 5000,
    animateInside: true,
  });
}

function success(title, msg){
  iziToast.success({
    title: title,
    message: msg,
    position: 'topCenter',
    timeout: 5000,
    animateInside: true,
  });
}

function warning(title, msg){
  iziToast.warning({
    title: title,
    message: msg,
    position: 'topCenter',
    timeout: 5000,
    animateInside: true,
  });
}

function info(title, msg){
  iziToast.info({
    title: title,
    message: msg,
    position: 'topCenter',
    timeout: 5000,
    animateInside: true,
  });
}
