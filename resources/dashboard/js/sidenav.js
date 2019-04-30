$(document).ready(function(){
    $('.modal').modal();
    $('.sidenav').sidenav();
});
const APIuseradmin='../../global/api/dashboard/adminusers.php?site=dashboard&action='

//Close Session
function LogOff(){
  location.href=  APIuseradmin+'logOff';
}