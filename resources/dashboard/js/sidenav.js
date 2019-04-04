$(document).ready(function(){
    $('.modal').modal();
    $('.sidenav').sidenav();
});
const APIuseradmin='../../global/api/adminusers.php?site=dashboard&action='

//Close Session
function LogOff(){
  location.href=  APIuseradmin+'logOff';
}