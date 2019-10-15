@extends('backEnd.masterPage')
@section('mainPart')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class=" card-header">
                   About US Section
                </div>
                <div class="card-body">
                    {!! Form::open(['url'=>'about','method'=>'post','id'=>'ajax-form']) !!}
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Page Text</label>
                            <input type="hidden" name="id" value="1">
                            <textarea name="text" id ="editor" required class="form-control" >{{isset($about_us->id)?$about_us->text:null}}</textarea>             
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Image</label>
                            @if(isset($about_us->id))
                                <img src="{{$about_us->image}}" width="300"><br>
                            @endif
                            <input type="file" class="form-control" name="image" {{isset($about_us->id)?'null':'required'}} accept="image/*" >
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>            
        </div>
    </div>
</div>

<!-- Goals Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class=" card-header">
                    <div class="row">
                        <div class="col-6">Our Services</div>
                        <div class="col-6 text-right">
                            <a href="{{url('about/service/create')}}" class="btn btn-sm btn-primary ajax-click-page">Add Service</a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>SN.</th>
                                <th>Image</th>
                                <th>Heading</th>
                                <th>Text</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script>
        var table;
        $(function() {        
            // Load Data via datatable
            table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!!url('about/service/list') !!}',
                columns: [
                    { data: 'index', name: 'index' },
                    { data: 'image', name: 'image' },
                    { data: 'heading', name: 'heading' },
                    { data: 'text', name: 'text' },
                    { data: 'link', name: 'link' },
                    { data: 'action', name: 'action' }
                ],
                "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]]
            });
        });
        
    </script>
@endsection