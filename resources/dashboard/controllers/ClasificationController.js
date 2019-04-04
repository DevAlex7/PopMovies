

const APIClasifications = '../../global/api/clasifications.php?site=dashboard&action='
$('#ClasificationAddForm').submit(function(){
    e.preventDefault();
    $.ajax({
        url:APIClasifications+'createClasification',
        type:'POST',
        data:new FormData($('#ClasificationAddForm')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#ClasificationAddForm')[0].reset();
                M.toast({html:'Proveedor agregado satisfactoriamente'});
                $("#ModalAddClasification").modal('close');
            }else{
                M.toast({html:result.exception});
            }
        }else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})