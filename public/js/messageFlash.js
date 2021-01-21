"use strict";

function message(){
  let msg = document.getElementById('messageInfo');

  if( msg != null ){
    msg.classList.toggle('hide');
  }
}

setTimeout(message, 2000);




// function chrono(){
//   setTimeout(message, 2000);
// }

//document.addEventListener( "DOMContentLoaded", chrono );
