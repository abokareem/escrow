//login
$('#login').on('submit', function(e) {
  e.preventDefault();

  $.ajax({
    url: './process/orders.php?login',
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
