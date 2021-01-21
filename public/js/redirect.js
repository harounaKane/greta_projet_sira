
let filtre = document.getElementById('filtre');

if(filtre){
  //   filtre.onchange = function(){
  //   window.location.href = this.children[this.selectedIndex].getAttribute('href');
  // }

  filtre.addEventListener('change', function(){
    window.location.href = this.children[this.selectedIndex].getAttribute('href');
  })

}
