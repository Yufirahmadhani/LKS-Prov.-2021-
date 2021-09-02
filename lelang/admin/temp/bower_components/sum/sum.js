
function sum() {
  
    var txtFirstNumberValue1 = document.getElementById('km_argo1').value;
    var txtFirstNumberValue2 = document.getElementById('km_isi1').value;
    var txtFirstNumberValue3 = document.getElementById('rit1').value;
    var txtFirstNumberValue4 = document.getElementById('drop1').value;
    var txtFirstNumberValue5 = document.getElementById('spd1').value;

    var txtSecondNumberValue1 = document.getElementById('km_argo2').value;
    var txtSecondNumberValue2 = document.getElementById('km_isi2').value;
    var txtSecondNumberValue3 = document.getElementById('rit2').value;
    var txtSecondNumberValue4 = document.getElementById('drop2').value;
    var txtSecondNumberValue5 = document.getElementById('spd2').value;

    if(txtFirstNumberValue1 > txtSecondNumberValue1) {
      var result1 = parseInt(txtFirstNumberValue1) + parseInt(txtSecondNumberValue1);
      var result2 = parseInt(txtFirstNumberValue2) + parseInt(txtSecondNumberValue2);
      var result3 = parseInt(txtFirstNumberValue3) + parseInt(txtSecondNumberValue3);
      var result4 = parseInt(txtFirstNumberValue4) + parseInt(txtSecondNumberValue4);
      var result5 = parseInt(txtFirstNumberValue5) + parseInt(txtSecondNumberValue5);
    }
    
    else{
      var result1 = parseInt(txtSecondNumberValue1) - parseInt(txtFirstNumberValue1);
      var result2 = parseInt(txtSecondNumberValue2) - parseInt(txtFirstNumberValue2);
      var result3 = parseInt(txtSecondNumberValue3) - parseInt(txtFirstNumberValue3);
      var result4 = parseInt(txtSecondNumberValue4) - parseInt(txtFirstNumberValue4);
      var result5 = parseInt(txtSecondNumberValue5) - parseInt(txtFirstNumberValue5);  
    }

    

    if (!isNaN(result1) || !isNaN(result2) || !isNaN(result3) || !isNaN(result4) || !isNaN(result5)) {
        document.getElementById('km_argo3').value = result1;
        document.getElementById('km_isi3').value = result2;
        document.getElementById('rit3').value = result3;
        document.getElementById('drop3').value = result4;
        document.getElementById('spd3').value = result5;
         
      }
    
      
      // var t_drop = parseInt(result4) * 520;
      //   var t_rit = parseInt(result3) * 6000;
      //   var kotor = parseInt(t_drop) + parseInt(t_rit);

      //   if(kotor >= 100 && kotor <= 200) {
      //     var bersih = parseInt((kotor - Bbm)) * (24.5/100);
      //   }
      //   else {
      //     var bersih = parseInt((kotor - Bbm)) * (60/100);
      //   }
 
      //   var setoran = parseInt(kotor) - parseInt(bersih) - parseInt(Bbm);

      //   document.getElementById('setor').value = setoran;
     
  }