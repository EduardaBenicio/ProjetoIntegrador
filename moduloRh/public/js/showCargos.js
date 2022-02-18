$(document).ready(function(){
    var BASE = "http://localhost/moduloRh/public/index.php/"

    $(".setor").on("change", function(){
        var controller = $(this).attr('id');
        var setor = $(this).val();
        

        $.ajax({
            url: BASE + controller,
            data: {idSetor: setor},
            type: 'POST',
            dataType: 'json',
            beforeSend: function(){
                $(".cargo").html("<option value=''>Carregando cargos...</option> ")
            },
            success: function(data){
                $(".cargo").html("<option value=''>Selecione o cargo</option> ");

                if(data){
                    $.each(data, function(key, value){
                        $(".cargo").append("<option value='"+ value['id'] +"'>"+ value['name'] +"</option> ");
                    });
                }
                
            }
        });
    });

});
