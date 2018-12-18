<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>

<div id="view_banner" style="position: absolute; top: 0; left: 0;">
    <a href="">
        
    </a>
</div>

<?php
if ($_GET) {
?>
<form>
    <input type="hidden" name="view_banner_id" id="view_banner_id" value="<?php echo $_GET['banner']; ?>" />
</form>
<?php
}
?>

<script type="text/javascript">
    $(document).ready(function() {
        var view_banner_id = $("input#view_banner_id").val();
        
        $.post(("fetch.php?banner=" + view_banner_id), {
            url: "Y"
        },
        function(data){
            $("#view_banner a").attr("href", data.target_url);
            $("#view_banner a").empty().append("<img alt='banner' src='fetch.php?banner="+view_banner_id+"&img=Y' />");
        }, "json");
    });
</script>