
<script>

    var urlList = "{url entity='module' name='kscommnetproduct' controller='ajax' params = ['action' => 'listComment']}";
    var url = "{url entity='module' name='kscommnetproduct' controller='ajax'}";

    $(document).ready(function() {

        $('#myform').on('submit', function (event) {
            event.preventDefault();
            saveData(event.currentTarget.action);
        });

        $("#btnSend2").clic(function(e) {
            //e.preventDefault();
            //e.currentTarget.action
            sendData(url);
        });

        loadData(url);
    });

    function saveData(url){
        let data = $("#myform").serialize();
        $.ajax({
                url: url,
                type: 'post',
                dataType: 'application/json',
                data: {
                    'data':data,
                    'action': 'saveComment'
                },
                success: function(data) {
                        $("#menu").append('<li class="list-group-item">'+data['comment']+'</li>');
                }
        });
    }

    function loadData(url){
        $.ajax({
                url: url,
                type: 'get',
                dataType: 'application/json',
                data: {
                    'action': 'listComment'
                },
                success: function(result) {
                    for(var i=0; i<result.length; i++){
                        $("#menu").append('<li class="list-group-item">'+result[i].comment+'</li>');
                    }  
                }
        });
    }

</script>


<u id="menu"  class="list-group">
    <li class="list-group-item">Cras justo odio</li>
</u>

<form id="myform" method="post" action="{url entity='module' name='kscommnetproduct' controller='ajax' params = ['action' => 'listComment']}" >  
    <fieldset class="form-group">
        <label class="form-control-label" for="exampleInput1">Comment</label>
        <textarea required class="form-control"  name="comment" id="comment" cols="30" row="10"> </textarea>
    </fieldset>

    <input type="submit" id="btnSend" class="btn btn-primary-outline" value="Send" />
</form>

<button id="btnSend2">Send2 </button>