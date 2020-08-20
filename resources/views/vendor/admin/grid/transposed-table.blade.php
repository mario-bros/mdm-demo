<style>

    table td.business-unit-data-col {
        padding-left: 3em !important;
        text-align: start;
    }

    table td.second-col {
        background-color: white;
    }

    .table-responsive .fixed-column {
        position: absolute;
        display: inline-block !important;
        width: auto;
        border-right: 5px solid #ddd;
        background-color: white;
    }

    .table-responsive td {
        white-space: nowrap !important;
    }

    .table-responsive .fixed-column th.first-col {
        _text-align: left;
        width: min-content;
        font-size: 12px;
    }

    .table.transpose th.first-col {
        _text-align: left;
        width: min-content;
        font-size: 12px;
    }

    .table.transpose .form-control.has-error {
        border-color: red;
        box-shadow: none; 
        -webkit-box-shadow: none;
    }
</style>

<div class="box">
    @if(isset($title))
        <div class="box-header with-border">
            <h3 class="box-title"> {{ $title }}</h3>
        </div>
    @endif

    {!! $grid->renderHeader() !!}

    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <div class="tables-container">
            <div class="table-wrap table-main">
                <table class="table transpose" id="{{ $grid->tableID }}">
                    <thead>
                        <tr>
                            @foreach($grid->visibleColumns() as $column)
                            <th {!! $column->formatHtmlAttributes() !!}>{{$column->getLabel()}}{!! $column->renderHeader() !!}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($grid->rows() as $row)
                        <tr {!! $row->getRowAttributes() !!}>
                            @foreach($grid->visibleColumnNames() as $name)
                            <td {!! $row->getColumnAttributes($name) !!} class="column-{!! $name !!}">
                                {!! $row->column($name) !!}
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>

                    {!! $grid->renderTotalRow() !!}

                </table>
            </div>

        </div>
    </div>

    {!! $grid->renderFooter() !!}

    <div class="box-footer clearfix">
        
    </div>
    <!-- /.box-body -->
</div>
