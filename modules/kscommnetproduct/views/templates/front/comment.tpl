
<!-- form action="{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" method="post" -->  
<form action="{url entity='module' name='kscommnetproduct' controller='form'}" method="post">  
    <fieldset class="form-group">
        <label class="form-control-label" for="exampleInput1">Comment</label>
        <textarea required class="form-control"  name="comment" id="comment" cols="30" row="10"> </textarea>
    </fieldset>

    <input type="submit" class="btn btn-primary-outline" value="Send" />
</form>