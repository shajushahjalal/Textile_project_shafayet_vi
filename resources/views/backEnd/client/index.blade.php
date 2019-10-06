@extends('backEnd.masterPage')
@section('mainPart')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class=" card-header">
                   Clients Section
                </div>
                <div class="card-body">
                    {!! Form::open(['url'=>'client','method'=>'post','id'=>'ajax-form']) !!}
                    <div class="form-group row">
                        <div class="col-12 col-sm-6">
                            <label>Section Title</label>
                            <input type="hidden" name="id" value="1">
                            <input type="text" class="form-control" name="pageTitle" value="{{isset($client->id)?$client->pageTitle:null}}" >
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Page Text</label>
                            <textarea name="text" id="editor" class="form-control" >{{isset($client->id)?$client->text:null}}</textarea>
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
                        <div class="col-6">Clients List</div>
                        <div class="col-6 text-right">
                            <a href="{{url('client/list/create')}}" class="btn btn-sm btn-primary ajax-click-page">Add Content</a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>SN.</th>
                                <th>Image</th>
                                <th>Name</th>
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
                ajax: '{!!url('client/list') !!}',
                columns: [
                    { data: 'index', name: 'index' },
                    { data: 'image', name: 'image' },
                    { data: 'name', name: 'name' },
                    { data: 'link', name: 'link' },
                    { data: 'action', name: 'action' }
                ],
                "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]]
            });
        });
        
    </script>
@endsection