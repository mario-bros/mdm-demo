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

            @if($grid->leftVisibleColumns()->isNotEmpty())
                <div class="table-wrap table-main table-fixed table-fixed-left">
                    <table class="table transpose">
                        <thead>
                        <tr>
                            @foreach($grid->leftVisibleColumns() as $column)
                                <th {!! $column->formatHtmlAttributes() !!}>{{$column->getLabel()}}{!! $column->renderHeader() !!}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($grid->rows() as $row)
                            <tr {!! $row->getRowAttributes() !!}>
                                @foreach($grid->leftVisibleColumns() as $column)
                                    @php
                                        $name = $column->getName()
                                    @endphp
                                    <td {!! $row->getColumnAttributes($name) !!} class="column-{!! $name !!}">
                                        {!! $row->column($name) !!}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>

                        {!! $grid->renderTotalRow($grid->leftVisibleColumns()) !!}

                    </table>
                </div>
            @endif
        </div>
    </div>

    {!! $grid->renderFooter() !!}

    <div class="box-footer clearfix">
        
    </div>
    <!-- /.box-body -->
</div>
