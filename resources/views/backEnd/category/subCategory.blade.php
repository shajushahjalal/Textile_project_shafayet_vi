@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Sub Category List</div>
                    <div class="col-6 text-right">
                    <a class="btn btn-sm btn-primary ajax-click-page" href="{{url('sub-category/create')}}" > + Add New Sub-Category</a>  
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Sub Category</th>
                            <th>Category </th>
                            <th>Title</th>
                            <th>Meta Tag</th>
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

@stop
@section('script')
<script>
    var table;
    $(function() {        
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ URL::current() }}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'subCategoryImage', name: 'subCategoryImage' },
                { data: 'subCategoryName', name: 'subCategoryName' },
                { data: 'categoryName', name: 'categoryName' },
                { data: 'pageTitle', name: 'pageTitle' },
                { data: 'metaTag', name: 'metaTag' },
                { data: 'position', name: 'position' },
                { data: 'publicationStatus', name: 'publicationStatus' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 6, "ASC" ]] 
        });
    });   
</script>
@endsection

