@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Brand List</div>
                    <div class="col-6 text-right">                        
                        <button class="btn btn-sm btn-primary" id="add-brand" >Add Brand</button>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="branding-table" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>link</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="branding"></div>
@stop
@section('script')
    <script>
        var branding;
        $(function(){
            branding = $('#branding-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    { data: 'index', name: 'index' },
                    { data: 'image', name: 'image' },
                    { data: 'name', name: 'name' },
                    { data: 'link', name: 'link' },
                    { data: 'position', name: 'position' },                    
                    { data: 'publicationStatus', name: 'publicationStatus' },
                    { data: 'action', name: 'action' }
                ],
                "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
                "order": [[ 4, "ASC" ]] 
            });

            $('#add-brand').click(function(){
                $.ajax({
                    url:'{{url('branding/create')}}',
                    method: 'GET',
                    dataType : "html",
                    success:function(html){
                        $('#branding').html(html);
                        $('#branding').find('.modal').modal('show');
                    }
                });
            }); 

            // From Submit
            $('#branding').on('submit','form',function(e){
                e.preventDefault();
                $(this).find('#submit').text('loading...');
                $(this).find('#submit').attr('disabled',true);
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
                        if(output.status == 'success'){
                            Swal.fire({
                                type: 'success',
                                title: output.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $(this).trigger("reset");
                            $('#branding').find('.modal').modal('hide');
                            branding.ajax.reload();
                        }else{
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: output.message
                            })
                        }
                    }
                });
            });
        });

        function editBrand(id){
            $.ajax({
                url:'{{url('branding/edit')}}'+'/'+id,
                method: 'GET',
                dataType : "html",
                success :function(html){
                    $('#branding').html(html);
                    $('#branding').find('.modal').modal('show');
                }
            });
        }
        
    </script>
@endsection