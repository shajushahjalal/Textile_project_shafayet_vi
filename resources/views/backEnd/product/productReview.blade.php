@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-12">ProductReview List</div>                    
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="review-table" class="table table-striped ">
                    <thead class="bg-success">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script> 
    var table = "";
    $(function(){    
        // Load Data via datatable
        table = $('#review-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! URL::current() !!}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'image', name: 'image' },
                { data: 'productName', name: 'productName' },
                { data: 'rating', name: 'rating' },
                { data: 'review', name: 'review' },
                { data: 'publicationStatus', name: 'publicationStatus' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 0, "desc" ]] 
        }); 

        $(document).on('submit','form',function(e){
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
                success:function(data){
                    $('.modal').modal('hide');
                    if(data.status == 'success'){
                        successMessage(data.message);                
                    }else{
                        errorMessage(data.message)
                    }    
                    table.ajax.reload();            
                    button.text(buttonText);
                    button.removeAttr('disabled');
                }
            });
        });              
    });
    
</script>
@endsection

