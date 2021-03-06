<?php

?>
<div class="row raise_the_roof">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>New Leads!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>New Conversions!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Closed Accounts!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            

<div class="row raise_the_roof">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<!--
                            DataTables Advanced Tables
-->
	                     
                
                
                
                
								<div class="row">
									<div class="col-md-4 pull-left">
										<button type="button" class="btn btn-labeled btn-default btn-sm">						   
										<span class="btn-label"><i class="glyphicon glyphicon-chevron-left"></i></span>Left</button>
										<button type="button" class="btn btn-labeled btn-default btn-sm">
										<span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>Right</button>									
									</div>
									
							        <div class="search">				                
										<input type="text" id="contact_search_table_text_field" class="form-control input-sm" maxlength="64" placeholder="Search" />
										 <button id="contact_search_table_button" type="submit" class="cool_search_button btn btn-primary btn-sm">Search</button>
									</div>
								</div>
                            
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body medium_minimum_height">
                            <div class="well2">
								<table id="personDataTable" class="table table-striped">
								    <tr>
								        <th>Contact ID</th>
								        <th>First Name</th>
								        <th>Last Name</th>
								        <th>Phone</th>
								        <th>Job Title</th>
								        <th>Contact Date</th>
								    </tr>
								    
								</table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
</div>
            <!-- /.row -->


<script>


$(function() {
	
	
	
    console.log("running");
    
    $.ajax({
    url: '<?php echo base_url(); ?>index.php/api/get_contacts',
    type: "post",
    dataType: "json",
    data: {lim: 10, off: 0},
    success: function(data, textStatus, jqXHR) {
        // since we are using jQuery, you don't need to parse response
        drawTable(data.data);
    }
});
		
		
		
function drawTable(data) {
	//delete the current rows first
	$("#personDataTable").find("tr:gt(0)").remove();
    for (var i = 0; i < data.length; i++) {
        drawRow(data[i]);
    }      
}

function drawRow(rowData) {
    var row = $("<tr />")
    $("#personDataTable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
    row.append($("<td>" + rowData.Contact_ID + "</td>"));
    row.append($("<td>" + rowData.First_Name + "</td>"));
    row.append($("<td>" + rowData.Last_Name + "</td>"));
    row.append($("<td>" + rowData.Phone + "</td>"));
    row.append($("<td>" + rowData.Job_Title + "</td>"));
    row.append($("<td>" + rowData.Contact_Date + "</td>"));
}



$( "#contact_search_table_button" ).click(function() {
	//delete old table
	$("#personDataTable").find("tr:gt(0)").remove();	
	console.log("search button clicked");
  var search_query = $( "#contact_search_table_text_field" ).val();
  

  
  
      $.ajax({
    url: '<?php echo base_url(); ?>index.php/api/search_contacts',
    type: "post",
    dataType: "json",
    data: {lim: 10, off: 0, q: search_query},
    success: function(data, textStatus, jqXHR) {
        // since we are using jQuery, you don't need to parse response
        drawTable(data.data);
        $("#personDataTable").find("tr:gt(0)").highlight(search_query);
	    }
	});

  
  
});




    
    
});

</script>
