
        <!-- FOOTER -->
        <div id="footer">
            <div class="devider-footer-left"></div>
            <div class="time">
                <p id="spanDate"></p>
                <p id="clock"></p>
            </div>
            <div class="copyright">Copyright &copy; <?php echo date('Y'); ?> <a href="">Twitter Bot</a>
            </div>
            <div class="devider-footer"></div>
        </div>
        <!-- / FOOTER -->
    </div>
    <!-- Container -->





    <!-- 
    ================================================== -->
    <script type='text/javascript' src="<?= base_url('assets/js/jquery.js'); ?>"></script>
    <script type='text/javascript' src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
    <script type='text/javascript' src="<?= base_url('assets/js/date.js'); ?>"></script>
    <script type='text/javascript' src="<?= base_url('assets/js/slimscroll/jquery.slimscroll.js'); ?>"></script>

    <script type='text/javascript' src="<?= base_url('assets/js/tab/jquery.newsTicker.js'); ?>"></script>
    <script type='text/javascript' src="<?= base_url('assets/js/tab/app.ticker.js'); ?>"></script>
    <script type='text/javascript' src="<?= base_url('assets/js/app-topmenu.js'); ?>"></script>

    <script type='text/javascript' src="<?= base_url('assets/js/vegas/jquery.vegas.js'); ?>"></script>
    <script type='text/javascript' src="<?= base_url('assets/js/image-background.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.tabSlideOut.v1.3.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/bg-changer.js'); ?>"></script>
    <!-- select-->
    <script src="<?= base_url('assets/js/bootstrap-select.min.js'); ?>"></script>

    <script type='text/javascript' src="<?= base_url('assets/js/number-progress-bar/jquery.velocity.min.js'); ?>"></script>
    <script type='text/javascript' src="<?= base_url('assets/js/number-progress-bar/number-pb.js'); ?>"></script>
    <script src="<?= base_url('assets/js/loader/loader.js" type="text/javascript'); ?>"></script>
    <script src="<?= base_url('assets/js/loader/demo.js" type="text/javascript'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/skycons/skycons.js'); ?>"></script>
    <script src="<?= base_url('assets/js/datatables/jquery.dataTables.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/datatables/dataTables.bootstrap.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/footable/js/footable-v=2-0-1.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/footable/js/footable.sort-v=2-0-1.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/footable/js/footable.filter-v=2-0-1.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/footable/js/footable.paginate-v=2-0-1.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/footable/js/footable.paginate-v=2-0-1.js'); ?>" type="text/javascript"></script>
    <!-- TAB SLIDER -->
    <script>
        //Animation Slider
        $(function() {
            function randomPercentage() {
                return Math.floor(Math.random() * 100);
            }

            function randomInterval() {
                var min = Math.floor(Math.random() * 30);
                var max = min + (Math.floor(Math.random() * 40) + 70);
                return [min, max];
            }

            function randomStep() {
                return Math.floor(Math.random() * 10) + 5;
            }

            // setup
            var $basic = $('#basic');
            var interval = randomInterval();
            var basicBar = $basic.find('.number-pb').NumberProgressBar({
                style: 'basic',
                min: interval[0],
                max: interval[1]
            })
            $basic.find('.title span').text('[Min: ' + interval[0] + ', Max: ' + interval[1] + ']');

            var percentageBar = $('#percentage .number-pb').NumberProgressBar({
                style: 'percentage'
            })

            var $step = $('#step');
            var maxStep = randomStep()
            var stepBar = $('#step .number-pb').NumberProgressBar({
                style: 'step',
                max: maxStep
            })
            $step.find('.title span').text('[Max step: ' + maxStep + ']');

            // loop
            var basicLoop = function() {
                basicBar.reach(undefined, {
                    complete: percentageLoop
                });
            }

            var percentageLoop = function() {
                percentageBar.reach(undefined, {
                    complete: stepLoop
                });
            }

            var stepLoop = function() {
                stepBar.reach(undefined, {
                    complete: basicLoop
                });
            }

            // start
            basicLoop();
        });
    </script>
    <script type="text/javascript">
        (function($) {
            "use strict";
            $("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });
        })(jQuery);

        (function($) {
            "use strict";
            $('.footable-res').footable();
        })(jQuery);

        (function($) {
            "use strict";
            $('#footable-res2').footable().bind('footable_filtering', function(e) {
                var selected = $('.filter-status').find(':selected').text();
                if (selected && selected.length > 0) {
                    e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                    e.clear = !e.filter;
                }
            });

            $('.clear-filter').click(function(e) {
                e.preventDefault();
                $('.filter-status').val('');
                $('table.demo').trigger('footable_clear_filter');
            });

            $('.filter-status').change(function(e) {
                e.preventDefault();
                $('table.demo').trigger('footable_filter', {
                    filter: $('#filter').val()
                });
            });

            $('.filter-api').click(function(e) {
                e.preventDefault();

                //get the footable filter object
                var footableFilter = $('table').data('footable-filter');

                alert('about to filter table by "tech"');
                //filter by 'tech'
                footableFilter.filter('tech');

                //clear the filter
                if (confirm('clear filter now?')) {
                    footableFilter.clearFilter();
                }
            });
        })(jQuery);
    </script>
</body>

</html>
