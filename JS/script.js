// window.onload = function(){
//
//
// }
// document.getElementById("signIn")
//     .addEventListener("keypress", function(event) {
//         event.preventDefault();
//         if (event.keyCode === 13) {
//             document.getElementsByClassName("enter").click();
//         }
//     });
// //
// function buttonCode()
// {
//     alert("Button code executed.");
// }
//
// function ShowDiv() {
//     document.getElementById("loginForm").style.display = "block";
window.onload = function () {
    var loginpopup = document.getElementById(loginpopup);
    var registerpopup = document.getElementById(registerpopup);

}

function showloginpopup() {

   loginpopup.style.display="block";
   console.log("done");

}
function hideloginpopup() {
    loginpopup.style.display="none";

}
function showregisterpopup() {

    registerpopup.style.display="block";
    registerpopup.style.overflow="scroll";
    console.log("done");

}
function hideregisterpopup() {
    registerpopup.style.display="none";
    console.log("done");

}

$(function () {
    $('[data-toggle="popover"]').popover()
  })

function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
// function passwordcheck(){
// }