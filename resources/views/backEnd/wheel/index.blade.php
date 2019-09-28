@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        {!! Form::open([ 'url' =>'wheel', 'method'=> 'post', 'class' => 'form-horizontal', 'id'=>'ajax-form', 'files' => true ]) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <label>Heading</label>
                    <input type="hidden" name="id" value="{{isset($wheelConfig->id)?$wheelConfig->id:0}}" >
                    <input type="text" value="{{ isset($wheelConfig->heading)?$wheelConfig->heading:null }}" name="heading" class="form-control" placeholder="Wheel Heading">
                </div>
                <div class="col-sm-6 col-md-4">
                    <label>Display</label>
                    <select name="show_time" class="form-control" required >
                        <option value=""> Select one</option>
                        <option value="0" {{ isset($wheelConfig->show_time) && $wheelConfig->show_time == 0 ?'selected':null}} >Stop Showing</option>
                        <option value="1" {{ isset($wheelConfig->show_time) && $wheelConfig->show_time == 1 ?'selected':null}} >Show Only One Time</option>
                        <option value="2" {{ isset($wheelConfig->show_time) && $wheelConfig->show_time == 2 ?'selected':null}} >Show Multiple Times</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-4">
                    <label>logo</label><br>
                    <input type="file" name="logo" accept="image/png" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label>Body Text</label>
                    <textarea class="form-control" id="editor" name="text" >{{ isset($wheelConfig->text)?$wheelConfig->text:null }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" id="submit" class="btn btn-primary"> Save Information</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Wheel Conponent List</div>
                    <div class="col-6 text-right">                        
                        <a href="{{url('wheel-component/create')}}" class="btn btn-sm btn-primary wheel-component-add">Add New</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="wheel-component-table" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Show Text</th>
                            <th>Discount Price</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="wheel-component"></div>
@stop
@section('script')
<script>
    var coupon;
    $(function(){
        coupon = $('#wheel-component-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url()->current() }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'text', name: 'text' },
                { data: 'value', name: 'value' },
                { data: 'message', name: 'message' },
                { data: 'publicationStatus', name: 'publicationStatus' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 0, "DESC" ]] 
        });

        $('.wheel-component-add').click(function(e){
            e.preventDefault();
            $.ajax({
                url: $(this).attr('href'),
                method: 'GET',
                dataType : "html",
                success:function(html){
                    $('#wheel-component').html(html);
                    $('#wheel-component').find('.modal').modal('show');
                },
                error: function(){
                    errorMessage();
                }
            });
        }); 

        // From Submit
        $('#wheel-component').on('submit','form',function(e){
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
                        successMessage(output.message);
                        $(this).trigger("reset");
                        $('#wheel-component').find('.modal').modal('hide');
                        coupon.ajax.reload();
                    }else{
                        errorMessage(output.message);
                    }
                }
            });
        });
    });

    $(document).on('click','.edit-wheel',function(e){
        e.preventDefault();
        $.ajax({
            url : $(this).attr('href'),
            method: 'GET',
            dataType : "html",
            success :function(html){
                $('#wheel-component').html(html);
                $('#wheel-component').find('.modal').modal('show');
            },
            error : function(){
                errorMessage();
            }
        });
    });

    function deleteCoupon(id){
        if(confirm('Are you sure ???')){
            $.ajax({
                url:'{{url('coupon/delete')}}'+'/'+id,
                method: 'GET',
                dataType : "json",
                success :function(message){
                    if(message == "success"){
                        successMessage("Delete Successfully");
                    }else{
                        errorMessage(message);
                    } 
                    coupon.ajax.reload();                       
                },
                error:function(){
                    errorMessage();
                }
            });                
        }            
    }
    
</script>
@endsection