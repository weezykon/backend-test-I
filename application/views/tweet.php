<style>
    
</style>
<div class="wrap-sidebar-content">
    <!-- CONTENT -->
    <div class="wrap-fluid" id="paper-bg">
        <div class="row">
            <div class="col-lg-6" style="margin:auto">
                <div class="box">
                    <div class="box-body">
                        <h3>Insert Twitter Hashtag</h3>
                        <form class="" method="POST" id="insert">
                            <div class="form-group">
                                <input class="form-control" placeholder="Hashtag" name="hashtag[]" type="text" required=""/>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" type="submit" id="hashBtn">Fetch Tweets</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body">
                        <div id="showData">
                            <h3>No Data Available</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/paper bg -->
</div>
<script type='text/javascript' src="<?= base_url('assets/js/jquery.js'); ?>"></script>
<script>
    $('form').submit(function(event){
        document.getElementById("hashBtn").disabled = true;
        document.getElementById("hashBtn").innerHTML = "Loading...";
        event.preventDefault();
        $.ajax({
            url: "<?= base_url('hashtag')?>",
            method: "POST",
            data: $('form').serialize(),
            dataType: "html",
            success: function(response){
                console.log(response);
                $('#insert')[0].reset();
                $('#showData').html(response);
                document.getElementById("hashBtn").disabled = false;
                document.getElementById("hashBtn").innerHTML = "Fetch Tweets";
            },
            error:function(response){
                console.log(response.responseText);
                toastr.error(response.responseText);
                document.getElementById("hashBtn").disabled = false;
                document.getElementById("hashBtn").innerHTML = "Fetch Tweets";
            }
        })
    })
</script>