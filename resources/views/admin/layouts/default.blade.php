<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('title') Administration @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
    @show
    <link href="{{ URL::asset('css/common/admin.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/common/common.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/common/admin.js') }}"></script>
    <script src="{{ URL::asset('js/common/common.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    @yield('styles')
</head>
<body>
    <div id="wrapper">
            @include('admin.partials.nav')
            <div id="page-wrapper">
                @yield('main')
            </div>
        </div>
    </div>

<script type="text/javascript">
    @if(isset($type))
    var oTable;
    $(document).ready(function () {
        oTable = $('#table').DataTable({
            "oLanguage": {
                "sProcessing": "{{ trans('table.processing') }}",
                "sLengthMenu": "{{ trans('table.showmenu') }}",
                "sZeroRecords": "{{ trans('table.noresult') }}",
                "sInfo": "{{ trans('table.show') }}",
                "sEmptyTable": "{{ trans('table.emptytable') }}",
                "sInfoEmpty": "{{ trans('table.view') }}",
                "sInfoFiltered": "{{ trans('table.filter') }}",
                "sInfoPostFix": "",
                "sSearch": "{{ trans('table.search') }}:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "{{ trans('table.start') }}",
                    "sPrevious": "{{ trans('table.prev') }}",
                    "sNext": "{{ trans('table.next') }}",
                    "sLast": "{{ trans('table.last') }}"
                }
            },
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": "{{ url('admin/'.$type.'/data') }}",
            "pagingType": "full_numbers",
            "fnDrawCallback": function (oSettings) {
                $(".iframe").colorbox({
                    iframe: true,
                    width: "80%",
                    height: "80%",
                    onClosed: function () {
                        oTable.ajax.reload();
                    }
                });
            }
        });
    });
    @endif
</script>
@yield('scripts')
<script>
        CKEDITOR.replace( 'editor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
</body>
</html>