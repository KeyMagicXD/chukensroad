window.onload = function () {


    // Get the modal
    var modal = document.getElementById("logout");

    // Get the button that opens the modal
    var btn = document.getElementById("outbtn");

    // Get the <span> element that closes the modal
    var span = document.getElementById("close");
    var confirm = document.getElementById("confirm");

   
 

    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "";
    }
    confirm.onclick = function () {
        window.location = "logout";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
   
}
