<!-- BEGIN Main Content -->
 {literal}
 <script type='text/javascript'>
 
 
 function confirmdelete(id)
 {

 var temp=decision();
  if(temp)
   {	
	
	window.location.href='index.php?module=caindex&event=delete&id='+id;
	}
	else{
	return false;
	}
 }
 
 



$(document).ready(function(){
 $("#deleteSelected").click(function(){
	 
	 var temp=decision();
  if(temp)
   {	
	 
	 
	 
 var checkedArray=Array();
 var i=0;
  $('input[name="checkboxid"]:checked').each(function() {
i++;
checkedArray[i]=$(this).val();
});
var parameters = {
  "array1":checkedArray
};


$.ajax({
    url : "index.php?module=caindex&event=deleteindex",
    type: "POST",
    data : parameters,
    success: function(data, textStatus, jqXHR)
    {
       
	   window.location.href='index.php?module=caindex';
	    //data - response from server
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
 
    }
});

}
	else{
	return false;
	}


});
	 
	 
	
	 
 
}); 
 function decision(){
if(confirm("Are you sure to delete?")) {
	var text=makeid();
	var replytext= prompt("Please fill text : "+text,"")
	if(replytext!= null && replytext==text)
	{
	return true;
	}else{
	alert("Input Text Not Match, Please Try Again.")
return	decision();
	}
	
}}
function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
</script>
 
 {/literal}
               
<div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table"></i> Index</h3>
                            </div>
                            <div class="box-content">
                                <div class="btn-toolbar pull-right clearfix">
                                    <div class="btn-group">
                                        <!-- <a class="btn btn-circle show-tooltip" title="Add new record" href="index.php?module=caindex&event=addNew" ><i class="icon-plus"></i></a>
                                       <a class="btn btn-circle show-tooltip" title="Edit selected" href="#"><i class="icon-edit"></i></a>-->
                                        {if $sessData.User.type==1}
      <a class="btn btn-circle show-tooltip" title="Delete selected" id="deleteSelected" href="#">Delete Selected</a>
                                    
                                    {/if}
                                    </div>
                                    <!--<div class="btn-group">
                                        <a class="btn btn-circle show-tooltip" title="Print" href="#"><i class="icon-print"></i></a>
                                        <a class="btn btn-circle show-tooltip" title="Export to PDF" href="#"><i class="icon-file-text-alt"></i></a>
                                        <a class="btn btn-circle show-tooltip" title="Export to Exel" href="#"><i class="icon-table"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-circle show-tooltip" title="Refresh" href="#"><i class="icon-repeat"></i></a>
                                    </div>-->
                                </div>
                                <div id="Div" class="clearfix"></div>
<table class="table table-advance" id="table1">
    <thead>
        <tr>
            <th style="width:18px"><input type="checkbox" /></th>
            <th>Name</th>
            <th>Code</th>
             <th>Client</th>
               <th>Total Tickers</th>
             <th>Currency</th>
            <th>Live Date</th>
  	        <th>Dividend Adj.</th>
<th>Index Type</th>
            <th>Submitted</th>
            <th>DB Status</th>
              <th>User Status </th>
            
            
            <th style="width:100px">Action</th>
        </tr>
    </thead>
    <tbody>
    	{foreach from=$indexdata item=point key=k}
        <tr>
            <td><input type="checkbox" id="checkboxid"  name="checkboxid" value="{$point.id}" /></td>
            <td>{$point.name}</td>
            <td>{$point.code}</td>
            <td>{$point.clientname}</td>
          <td>{$point.total_ticker}</td>
            <td>{$point.curr}</td>
            <td>{$point.dateStart}</td>
                  <td>{if $point.cash_adjust=='1'}Stock{else}Divisor{/if}</td>
                    <td>{if $point.ireturn=='1'}PR{elseif $point.ireturn=='2'}Dividend Placeholder{else}TR{/if}</td>
            <td>{if $point.status==0}<span class="label label-important">No!</span>{else}<span class="badge badge-success">Yes</span>{/if}</td>
             <td>{if $point.dbusersignoff==0}<span class="label label-important">No!</span>{else}<span class="badge badge-success">Yes</span>{/if}</td>
              <td>{if $point.usersignoff==0}<span class="label label-important">No!</span>{else}<span class="badge badge-success">Yes</span>{/if}</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-small show-tooltip" title="View" href="index.php?module=caindex&event=view&id={$point.id}">View</a>&nbsp;|&nbsp;
                    <a class="btn btn-small show-tooltip" title="Edit" href="index.php?module=caindex&event=editfornext&id={$point.id}">Edit</a>
                    &nbsp;|&nbsp;
                   <!-- index.php?module=caindex&event=delete&id={$point.id}-->
                    <a class="btn btn-small btn-danger show-tooltip " title="Delete" href="#" id="a1" onclick="confirmdelete({$point.id})">Delete</a>
                </div>
            </td>
        </tr>
        {/foreach}
     
    </tbody>
</table>
                            </div>
                        </div>
                    </div>
                </div>
                
                  <!-- END Main Content -->