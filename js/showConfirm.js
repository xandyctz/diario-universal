window.onload = function reload() { 
  document.getElementById('dialog-dark-rounded').showModal();
}

const cancel = () => {
  let clicou = false
  if(!clicou) {
    localStorage.setItem('termos', 'nao aceitou')
    alert('Voce precisa aceitar os termos de uso')
    location.href = './'
  }
}

const confirm = () => {
  let clicou = true
  if(clicou) {
    localStorage.setItem('termos', 'aceitou')
    alert('Aproveite')
    location.href = './diario'

  }
}
const termos = () => {
  window.open('termos.html','_blank');
  
}
