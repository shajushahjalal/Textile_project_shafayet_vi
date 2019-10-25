
$(function(){
    $(document).on('submit','#ajax-form',function(e){
        e.preventDefault();
        var button = $(this).find('#submit');
        var buttonText = button.text();
        button.text('Loading...');
        button.attr('disabled',true);
        var progress = $(this).find('.progress-bar');
        progress.html("0%");
        progress.css("width","0px");
        var data = new FormData($(this)[0]); 
        $.ajax({
            xhr: function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt){
                    if(evt.lengthComputable){
                        var persentComplete = parseFloat( (evt.loaded / evt.total ) * 100 ).toFixed(2);
                        progress.css("width",persentComplete+"%");
                        progress.html(persentComplete+"%");
                    }
                }, false);
                return xhr;
            },
            type: "POST",
            url: $(this).attr("action"),
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
        if(confirm('Are you Sure ???')){
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
        }
    });

    $(document).on('click','.ajax-click-page',function(e){
        e.preventDefault();        
        $.ajax({
            url : $(this).attr('href'),
            method : 'GET',
            dataType : 'html',
            success : function(output){  
                $('.modal').remove();            
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
            showConfirmButton: true,
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