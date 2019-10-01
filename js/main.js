
(function ($) {"use strict";
    
    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).addClass('active');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).removeClass('active');
            showPass = 0;
        }
        
    });

/*=========================================================================aqui va el boton guardar but lo quite */

        var editor= function(){
        $('#dt_ticket').on('click', 'button.editor', function (e) {
           console.log("hola")
       
        e.preventDefault();
      
        editor.edit( $(this).closest('tr'), {
            title: 'Edit record',
            buttons: 'Update'
                     } );
                } );
             }




$(document).on('click', '#btn_modificar', function(){  
    console.log("entro al formulario model");

      var ticket_id =  $(this).parents("tr").find("td")[0].innerHTML;
      console.log(ticket_id);

      var parametros ={ 
                        "ticket_id":'ticketid'
                    };
           $.ajax({
             data: {"ticket_id" : 'ticketid'},
            type: "POST",
            dataType: "json",
             url: "fetch.php",
                success:function(data){  
                    alert(data+'entro a data');
                     $('#ticket').val(data.id_ticket_num);  
                     $('#recibo').val(data.recibo_str);  
                    // $('#estado').val(data.id_estado_num);  
                     $('#comentario').val(data.comentario_str);   
                }  
           }); 
      });  
 $(document).ready(function() {    
        $('#dt_ticket').DataTable({
        //para cambiar el lenguaje a español
          "responsive": true,
            "language": {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            }
                        }   
        });     
    });  


        /*   var guardar= function(){
            $("#form").on("click",function(e){
                console.log(" recibio el console log");
              e.preventDefault();
                var frm=$(this).serialize();

                $.ajax({
                    "method":"POST",
                    "url":"actualizar.php",
                   "data":"frm"
                }).done(function(info){
                    console.log(info);
                });
            });
        }*/



/*
        var obtener_data_edit= function(tbody,table){
            $(tbody).on("click","button.editar",function(){
                var data =table.row($(this).parents("tr") ).data();
                var idticket=$("#ticket").val(data.id_ticket_num),
                    recibo=$("#recibo").val(data.recibo_str),
                    estado=$("#estado").val(data.id_estado_num),
                    comentario=$("#comentario").val(data.comentario_str)
            });
        }

/*===========================LISTAR========================================================= */
    
                    
/*===========================EDITAR========================================================= */



  
})(jQuery); 