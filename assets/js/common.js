/**
 * @author Kishor Mali
 */


jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	jQuery(document).on("click", ".deleteWork", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteWork",
			currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this work ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Work successfully deleted"); }
				else if(data.status = false) { alert("Work deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	jQuery(document).on("click", ".deleteBlog", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteBlog",
			currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this post ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Post successfully deleted"); }
				else if(data.status = false) { alert("Post deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	
});
