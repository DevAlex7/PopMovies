$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
});
const APIClient='../../global/api/home/users.php?site=ecommerce&action='

//Close Session
function LoOff(){
  location.href=  APIClient+'logOff';
}