const doc = document;
const menuOpen = doc.querySelector(".menu");
const menuClose = doc.querySelector(".close");
const overlay = doc.querySelector(".overlay");

menuOpen.addEventListener("click", () => {
  overlay.classList.add("overlay--active");
});

menuClose.addEventListener("click", () => {
  overlay.classList.remove("overlay--active");
});


window.addEventListener('scroll', function() {
  var head = document.getElementById('head');
  head.classList.toggle('sticky', window.scrollY > 0);
  var kust_logo = document.getElementById('kust_logo');
  kust_logo.classList.toggle('changeSize', window.scrollY > 0);
  document.getElementById('main').classList.toggle('changePadding', window.scrollY > 0);
});

function homepage() {
  window.open("../index.html", "_self");
}

window.onload = function setPage() {

  var parts = window.location.search.substr(1).split("&");
  var $_GET = {};
  for (var i = 0; i < parts.length; i++) {
    var temp = parts[i].split("=");
    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
  }

  if ($_GET[''] == 'undefined') {
    $_GET['department'] = 'all';
  }

  document.getElementById($_GET['department']).classList.toggle('selected');

  document.getElementById('_' + $_GET['department']).classList.toggle('selected');
  sortPage($_GET['department']);
}

function set_selected(id){
  var clicked = document.getElementsByClassName("btn");
  for (let i = 0; i < clicked.length; i++) {
    document.getElementById(clicked[i].id).classList.remove('selected');
  }

  if (id.charAt(0) == '_'){
    id = id.substring(1);
  }
  
  document.getElementById(id).classList.add('selected');
  document.getElementById('_' + id).classList.add('selected');

  sortPage(id);
}


function sortPage(id){
  var data = {};
  data['id'] = id;
  $.ajax({
    url: 'getBooksQuery.php',
    type: 'POST',
    data: data,
    success: function(responce){
      $('.category_container').html(responce);
    }
  });
}

function openPDF(id){
  var data = {};
  data['id'] = id;

  $.ajax({
    url: 'openBookQuery.php',
    type: 'POST',
    data: data,
    success: function(responce){
      window.open('../books/' + responce);
    }
  });
}

$('form.ajax').on('submit', function() {

  var that = $(this),
    url = that.attr('action'),
    type = that.attr('method'),
    data = {};

  that.find('[name]').each(function() {
    var that = $(this),
      name = that.attr('name'),
      value = that.val();

    data[name] = value;
  });

  var books = document.getElementsByClassName('book_info');
  var key = data['search'];

  for (var i = 0; i < books.length; i++) {
    var bookName = books[i].firstChild.nextSibling.innerHTML;

    if (bookName == key) {
      books[i].parentElement.style.display = 'flex';
    } else {
      books[i].parentElement.style.display = 'none'
    }
    if (key == '') {
      books[i].parentElement.style.display = 'flex';
    }
  }

  return false;

});