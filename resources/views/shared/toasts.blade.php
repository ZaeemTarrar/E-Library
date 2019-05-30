<script>
    @if(Session::has('message'))

    toastr.success("{{ Session::get('message') }}", "<h4>Congratulations!</h4>")

    @endif

    @if(Session::has('error'))

    toastr.error("{{ Session::get('error') }}", "<h4>Please Note</h4>")

    @endif

    @if(Session::has('upgrade'))

    toastr.warning("{{ Session::get('upgrade') }}", "<h4>Notification</h4>")

    @endif

    @if(Session::has('info'))

    toastr.info("{{ Session::get('info') }}", "<h4>Notification</h4>")

    @endif
</script>
