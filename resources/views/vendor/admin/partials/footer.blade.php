<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        <strong>Developed by <a href="mailto:julio.notodiprodyo@mncgroup.com" target="_blank">IT MNC Holding</a></strong>

        &nbsp;&nbsp;&nbsp;&nbsp;

        @if(config('admin.show_environment'))
            <strong>Env</strong>&nbsp;&nbsp; {!! config('app.env') !!}
        @endif
    </div>
    <!-- Default to the left -->
    <strong>© {{ date('Y') }} Copyright Master Data Management. All Right Reserved.</strong>
</footer>
