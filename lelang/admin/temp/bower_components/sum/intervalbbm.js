function intervalbbm() {
  var bbm = document.getElementById('bbm').value;
  var spd = document.getElementById('spd3').value;
  
  var check = spd / 10;
  if(bbm > check) {
   //console.log('keliru');
    document.getElementById('argoplus').value = bbm * 10;
  }
  else {
      //console.log(check);
      document.getElementById('argoplus').value = "";
      
  }
  
  
  //console.log(check);
}
