function logout() {
  window.open("logout.php", "_self");
}

function homepage() {
  window.open("../index.html", "_self");
}

$('.form1').on('submit', function(e) {

  e.preventDefault();

  var bookname = document.getElementById('bookname').value;
  var bookauthor = document.getElementById('bookauthor').value;
  var department = document.getElementById('department').value;
  var pagenumber = document.getElementById('pagenumber').value;
  var route = document.getElementById('route').value;

  if (bookname == '' || bookauthor == '' || department == '' || pagenumber == '' || route == '') {
    // display the error messege 
    display_error('a', 'hello');
  } else {

    $.ajax({
      url: 'uploadbook.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(responce) {
        display_error(responce, responce);
      }
    });
  }
});

function reset_fields() {
  document.getElementById('bookname').value = null;
  document.getElementById('bookauthor').value = null;
  document.getElementById('department').value = "computer";
  document.getElementById('pagenumber').value = null;
  document.getElementById('route').value = null;
  $('#file-selected').html("Chose File"); 
}

function display_error(condition, response) {
  var x = document.getElementById('alert');
  var delay = 0;
  x.style.display = 'flex';

  switch (condition) {
    case 'Sorry, only pdf files are allowed.':
      x.style.backgroundColor = '#ff000060';
      document.getElementById('alert_head').innerHTML = 'Failed to upload your file';
      document.getElementById('alert_error').innerHTML = 'Sorry, only pdf files are allowed.';
      break;

    case 'the file could not be copied':
      x.style.backgroundColor = '#ff000060';
      document.getElementById('alert_head').innerHTML = 'Failed to upload your file';
      document.getElementById('alert_error').innerHTML = 'The file could not be copied <br> please check your file.';
      break;

    case 'your file was stored in the database':

      x.style.backgroundColor = '#5eff0085';
      document.getElementById('alert_head').innerHTML = 'Congratulations';
      document.getElementById('alert_error').innerHTML = 'Your file was stored in the database successfully';
      reset_fields();
      break;

    case 'file have already been uploaded':
      x.style.backgroundColor = '#ff000060';
      document.getElementById('alert_head').innerHTML = 'Failed to upload your file';
      document.getElementById('alert_error').innerHTML = 'File have already been uploaded, Please delete previous file before uploading new one';
      break;

    case response:
      x.style.backgroundColor = '#ff000060';
      document.getElementById('alert_head').innerHTML = 'Failed to upload your file';
      document.getElementById('alert_error').innerHTML = response;
      delay += 5000;
      break;

    case 'a':
      x.style.backgroundColor = '#ff000060';
      document.getElementById('alert_head').innerHTML = 'Failed to upload your file';
      document.getElementById('alert_error').innerHTML = 'Please enter all the fields correctly';
      break;
  }

  var fadeout = $('#alert');
  fadeout.delay(5000 + delay).fadeOut();
  fadeout.display = 'none';
}

$('#route').bind('change', function() {
  var fileName = '';
  fileName = $(this).val();
  $('#file-selected').html(fileName); 
})