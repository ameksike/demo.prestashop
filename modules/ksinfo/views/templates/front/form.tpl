{extends file='page.tpl'}

{block name='page_content'}
    
    <!-- IMAGE -->
    <!-- /dev/prestashop_1.7.6.5/modules/ksinfo/views/img/logo.png -->
    <div class="col-md-6  col-sm-12">
            {html_image file="/dev/prestashop_1.7.6.5/modules/ksinfo/views/img/logo.png"  class="img-thumbnail"  width="200"} <br>
    </div>
    <div class="col-md-6  col-sm-12">
        <img src="{$urls.base_url}modules/ksinfo/views/img/logo.png" class="img-thumbnail" width="200" />
    </div>

    <!-- FORM -->
    <div class="ksi-panel col-lg-12">
        <form action="{$link->getAdminLink('ksinfo', 'form')}" method="post">
            <div style="padding-bottom:10px;" class="form-group">
                <label for="" class="control-label col-lg-6">Title</label>
                <div class="col-lg-6">
                    <input class="form-control input-lg" type="text" name="title" />
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-lg-6">Message</label>
                <div class="col-lg-6">
                    <textarea name="message" class="form-control" style="min-width: 100%"></textarea>
                </div>
            </div>
            <input type="submit" name="btnFrmSend" value="send" class="btn btn-default" />
        </form> 
    <div>

    <!-- MSG -->
    <div class="col-lg-12">
        {if $msg!=""}
            <p>{$msg}</p>
        {/if}
    </div>

{/block}

