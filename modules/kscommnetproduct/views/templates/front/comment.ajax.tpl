
<script>
    var url = "{url entity='module' name='kscommnetproduct' controller='ajax' params = ['action' => 'list2']}";

    $(function() {
        $('#myform').on('submit', function (event) {
            event.preventDefault();
            sendData(event.currentTarget.action);
        });

        $("#btnSend2").clic(function(e) {
            //e.preventDefault();
            //e.currentTarget.action
            sendData(url);
        });

    });

    function sendData(url){
        $.ajax({
                url: url,
                type: 'post',
                dataType: 'application/json',
                data: $("#myform").serialize(),
                success: function(data) {
                        $("#menu").append('<li class="list-group-item">DATA 1</li>');
                }
        });
    }
</script>


<u id="menu"  class="list-group">
    <li class="list-group-item">Cras justo odio</li>
</u>

<form id="myform" method="post" action="{url entity='module' name='kscommnetproduct' controller='ajax' params = ['action' => 'list2']}" >  
    <fieldset class="form-group">
        <label class="form-control-label" for="exampleInput1">Comment</label>
        <textarea required class="form-control"  name="comment" id="comment" cols="30" row="10"> </textarea>
    </fieldset>

    <input type="submit" id="btnSend" class="btn btn-primary-outline" value="Send" />
</form>

<button id="btnSend2">Send2 </button>