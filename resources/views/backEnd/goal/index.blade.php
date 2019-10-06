@extends('backEnd.masterPage')
@section('mainPart')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class=" card-header">
                    Goals Section
                </div>
                <div class="card-body">
                    {!! Form::open(['url'=>'goals','method'=>'post','id'=>'ajax-form']) !!}
                    <div class="form-group row">
                        <div class="col-12 col-sm-6">
                            <label>Section Title</label>
                            <input type="hidden" name="id" value="1">
                            <input type="text" class="form-control" name="heading" value="{{isset($goals->id)?$goals->heading:null}}" >
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Section Title</label>
                            <input type="text" name="text" class="form-control" value="{{isset($goals->id)?$goals->text:null}}">
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
                        <div class="col-6">Goals Content</div>
                        <div class="col-6 text-right">
                            <a href="{{url('goals/content/create')}}" class="btn btn-sm btn-primary ajax-click-page">Add Content</a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>SN.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Persentage</th>
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
                ajax: '{!!url('goals/content') !!}',
                columns: [
                    { data: 'index', name: 'index' },
                    { data: 'image', name: 'image' },
                    { data: 'title', name: 'title' },
                    { data: 'text', name: 'text' },
                    { data: 'persent', name: 'persent' },
                    { data: 'action', name: 'action' }
                ],
                "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]]
            });
        });
        
    </script>
@endsection