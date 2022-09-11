var clicked = document.getElementsByClassName("btn");

for (let i = 0; i < clicked.length; i++) {

  clicked[i].onclick = function() {
    window.open("../BookView/books.php?department="+ clicked[i].id,'_self');
  }

};

function homepage(){
  window.open("../index.html","_self");
}

function login(){
  window.open("../signin/signin.php","_self");
}