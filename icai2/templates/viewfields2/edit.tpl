
{include file="notice.tpl"}
<div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i>Edit Fields</h3>
                                                </div>
                            <div class="box-content">
                                 <form action="" method="post" onsubmit="return ValidateForm();" class="form-horizontal">
                                
                                 {foreach from=$fields key=p item=item}
               <p>   {field data=$item value=$postData}{/field}
                </p>  {/foreach}
                                   
                                    <div class="form-actions">
                                    <button type="submit" class="btn btn-primary" name="submit" id="submit"><i class="icon-ok"></i> Save</button>
                                       <button type="button" class="btn" name="cancel" id="cancel"  onclick="document.location.href='{$BASE_URL}index.php?module=casecurities';">Back</button>
                                    </div>
                                    
                                    
                               
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>