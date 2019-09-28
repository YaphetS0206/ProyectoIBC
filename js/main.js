
(function ($) {"use strict";
    $(document).ready(function() { 
       
            listar();
         
    });  
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


        var guardar= function(){
            $("form").on("submit",function(e){
                e.preventDefault();
                var frm=$(this).serialize();

                $.ajax({
                    method:"POST",
                    url:"actualizar.php",
                    data:frm
                }).done(function(info){
                    console.log(info);
                });
            });
        }

        var obtener_data_edit= function(tbody,table){
            $(tbody).on("click","button.editar",function(){
                var data =table.row($(this).parents("tr") ).data();
                var idticket=$("#ticket").val(data.id_ticket_num),
                    recibo=$("#recibo").val(data.recibo_str),
                    estado=$("#estado").val(data.id_estado_num),
                    comentario=$("#comentario").val(data.comentario_str)
            });
        }


        var listar=function(){
            console.log("Entro en el listar");
            var table=$("#dt_ticket").DataTable({
                "responsive": true,
                "ajax":
                {
                    "method":"POST",
                    "url":"listar.php"
                },
                "columns":[
                {"data":"id_ticket_num"},
                {"data":"recibo_str"},
                {"data":"id_estado_num"},
                {"data":"comentario_str"},
                {"defaultContent":"<button type='button' class='editar btn btn-primary'data-toggle='modal'><i class='fa fa-pencil-square-o'></i></button>"}
                ],
                "columnDefs" : [
                        { targets : [2],
                          render : function (data, type, row) {
                             return data == '1' ? "<span class='badge badge-pill badge-success'>Pagado</span>" : " <span class='badge badge-pill badge-danger'>No pagado</span>"
                          }
                        }
                   ]

                
            });


              console.log("salio en el listar");
             obtener_data_edit("#dt_ticket tbody",table)
        }
 


})(jQuery);