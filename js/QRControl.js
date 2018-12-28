var result="";

function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    qrcode.callback = function(res) {
      if(res instanceof Error) {
        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
      } else {
        //make sure it's a UoG scanned QR code
          console.log(res);
        if(res.indexOf("uognd.studentsites.glos.ac.uk")>0){
          node.parentNode.nextElementSibling.value = res;
          result= res;//make sure hold result
        }else{
          alert("Sorry, that is not a valid University of Gloucestershire QR code. Please try again.");
        }
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}

function showQRIntro() {
  return confirm("Use your camera to take a picture of a QR code.");
}

function navigateToDesigner() {
  if(result!=""){
      //have already checked to make sure it's a UoG QR code, so navigate to page
      window.location.href = result; 
  }
}