$(document).ready(function () {
    $('.modal').modal();
});
function Open(){
    $('.sidenav').sidenav('open');
}
function ShowMovies(){
    let content ='';
    content+=`
        <div class="row" id="SearchContent">
            <div class="col s12 m8 offset-m2">
                <nav class="white">
                    <div class="nav-wrapper">
                        <form>
                        <div class="input-field">
                            <input id="search" type="search" placeholder="Buscar un genero...">
                            <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>      
        <div class="container">
            <div class="row" id="MoviesContent">
            
            </div>
        </div>
    `;
    $('#MoviesContent').html(content);
    $('.sidenav').sidenav('close');
}