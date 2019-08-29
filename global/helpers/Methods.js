function selectMethod(idDiv, indexMethod){
    switch(indexMethod){
        case 1:
            MethodGmail(idDiv);
            break;
        case 2:
            MethodDateCreated(idDiv);
            break;
    }
}
function MethodGmail(idDiv){
    let content = '';
    content+=`
        <p>Ingresa tu usuario para que podamos enviarte un correo</p>
        <input type="text" name="userRecover" id="userRecover">
        <a class="btn" id="btnGmail" onClick="verify()">Enviar</a>
    `;
    $('#'+idDiv).html(content);
}
function MethodDateCreated(idDiv){
    let content = '';
    content+=`
        <p> Ingresa el usuario a recuperar más su fecha de creación, nosotros nos encargaremos de enviarte un correo :)</p>
        <div class="row">
            <div class="col s7 m7 offset-m2">
            <input type="text" name="usernameRecover" autocomplete="new-password" placeholder="ingresa el usuario" id="usernameRecover">
            <input type="date" name="createdDate" id="createdDate">
            </div>
        </div>
        <a class="btn indigo" onClick="verifyCreated()" id="">Verificar</a>
    `;
    $('#'+idDiv).html(content);
}
