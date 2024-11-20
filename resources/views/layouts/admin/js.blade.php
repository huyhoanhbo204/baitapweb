<script src="{{asset('/style/admin/js/bootstrap.js')}}"></script>
<script src="{{asset('/style/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('/style/admin/js/scripts.js')}}"></script>
<script src="{{asset('/style/admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('/style/admin/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('/style/admin/js/jquery.scrollTo.js')}}"></script>
<!-- Calendar -->
<script type="text/javascript" src="/style/admin/js/monthly.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('#mycalendar').monthly({
            mode: 'event',
        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch (window.location.protocol) {
            case 'http:':
            case 'https:':
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }
    });
</script>