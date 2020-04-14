document.addEventListener("DOMContentLoaded", function(event) {
  let check = localStorage.getItem('termos')
  if (!check){
    location.href = '../index.html'
  } else {
    return
  }
});
