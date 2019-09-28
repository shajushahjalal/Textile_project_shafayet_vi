$(function(){
    $(document).on('submit','#ajax-form',function(e){
        e.preventDefault();
        var button = $(this).find('#submit');
        var buttonText = button.text();
        button.text('Loading...');
        button.attr('disabled',true);
        var data = new FormData($(this)[0]); 
        $.ajax({
            method: "POST",
            url: $(this).attr("action"),
            dataType: "json",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            success:function(output){
                if(output.modal == 1){
                    $('.modal').modal('hide');
                }
                if(output.status == 'success'){
                    successMessage(output.message);                
                }else{
                    errorMessage(output.message)
                }
                if(output.table == 1){
                    table.ajax.reload();
                }
                $(this).trigger("reset");
                button.text(buttonText);
                button.removeAttr('disabled');
            },
            error : function(){
                errorMessage();
            }

        });
    });

    
    $(document).on('click','.ajax-click',function(e){
        e.preventDefault();
        $.ajax({
            url : $(this).attr('href'),
            method : 'GET',
            success : function(output){                
                if(output.status == 'success'){
                    successMessage(output.message);                
                }else{
                    errorMessage(output.message)
                }
                if(output.table == 1){
                    table.ajax.reload();
                }                                 
            },
            error : function (){
                errorMessage();
            }
        });
    });

    $(document).on('click','.ajax-click-page',function(e){
        e.preventDefault();        
        $.ajax({
            url : $(this).attr('href'),
            method : 'GET',
            dataType : 'html',
            success : function(output){               
                $('body').append(output);
                $('.modal').modal('show');
            },
            error : function (){
                errorMessage();
            }
        });
    });

    function successMessage(message = null){
        Swal.fire({
            type: 'success',
            title: message,
            showConfirmButton: false,
            timer: 3000
        }); 
    }

    function errorMessage(message = null){
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: message === null ?'Something went Wrong':message,
        });
    }
});