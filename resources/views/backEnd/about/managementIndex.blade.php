@extends('backEnd.masterPage')
@section('mainPart')
<!-- Goals Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class=" card-header">
                    <div class="row">
                        <div class="col-6">Management</div>
                        <div class="col-6 text-right">
                            <a href="{{url('about/management/create')}}" class="btn btn-sm btn-primary ajax-click-page">Add Management</a>
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
                                <th>Text</th>
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
                ajax: '{!!url('about/management') !!}',
                columns: [
                    { data: 'index', name: 'index' },
                    { data: 'image', name: 'image' },
                    { data: 'name', name: 'name' },
                    { data: 'text', name: 'text' },
                    { data: 'action', name: 'action' }
                ],
                "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]]
            });
        });
        
    </script>
@endsection