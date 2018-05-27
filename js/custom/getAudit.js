$(document).ready(function() {
	var getAuditInterval;
	getAudit();
	function getAudit() {
		var ourRequest = new XMLHttpRequest();
		ourRequest.open('GET', 'auditLogs.php');
		ourRequest.onload = function() {
			var ourData = JSON.parse(ourRequest.responseText);

			$('#auditLogTable tr:not(:first-of-type)').remove();
			for(i = 0; i < ourData.length; i++) {
				var thisRow = "<tr>" + 
								"<td>"+ ourData[i].a_username +"</td>" +
								"<td>"+ ourData[i].a_action +"</td>" +
								"<td>"+ ourData[i].a_date +"</td>" +
							   "</tr>";
				$('#auditLogTable tr:last-of-type').after(thisRow);
			}
		};
		ourRequest.send();
	}
	getAuditInterval = setInterval( function() { getAudit() }, 10000);

	// Get To Do List
	var getToDoListInterval;
	getToDoList();
	function getToDoList() {
		var xhr = new XMLHttpRequest();

		xhr.open('GET', 'to-do-list.php', true);

		xhr.onload = function() {
			var toDoLists = JSON.parse(this.responseText);

			$('#tblToDoList tr:not(:first-of-type)').remove();
			
			for(var i in toDoLists) {
				var isDoneClass = '';
				var isDoneClassTR ='';
				if(toDoLists[i].is_done == "1") {
					isDoneClass = 'checked';
					isDoneClassTR = 'linethrough';
				}

				var toDoListRow = ''+
				"<tr>"+
				"<td><input type='checkbox' name='task"+ toDoLists[i].id +"' id='task"+ toDoLists[i].id +"' "+ isDoneClass +"> <label for='task"+ toDoLists[i].id +"' class='"+isDoneClassTR+"'>"+ toDoLists[i].task +"</label></td>"+
				"<td>"+toDoLists[i].priority+"</td>"+
				"<td>"+toDoLists[i].assignee+"</td>"+
				"<td>"+toDoLists[i].action+"</td>"+
				"</tr>";
				$('#tblToDoList tr:last-of-type').after(toDoListRow);
			}
		}

		xhr.send();
	}
	getToDoListInterval = setInterval( function() { getToDoList() }, 5000);

	// Add To Do List
	$('#addToDoList').submit(function(e) {
		e.preventDefault();
		var xhr = new XMLHttpRequest();
		var txtToItem = $('#txtToItem').val();
		var slcPriority = $('#slcPriority').val();
		var slcAssignee = $('#slcAssignee').val();
		var params = "txtToItem="+txtToItem+"&slcPriority="+slcPriority+"&slcAssignee="+slcAssignee;

		xhr.open('POST', 'add-to-do-list.php', true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhr.onload = function(){
			console.log(xhr.responseText);
			getToDoList();
			$('#txtToItem').val('');
			$('#slcPriority').val('');
			$('#slcAssignee').val('');
		}

		xhr.send(params);
	});

	// Checked To Do List
	$(document).on('click', '#toDoListForm input', function() {
		var itemID = $(this).attr('id');
		var isChecked = 0;
		
		
		if($(this).is(':checked')) {
			isChecked = 1;
			$('#toDoListCompletedForm #itemID').val(itemID);
			$('#toDoListCompletedForm #isChecked').val(isChecked);
			
			$('#toDoListModal').modal('open');
		} else {
			var params = "itemID="+itemID.replace('task','')+"&isChecked="+isChecked+"&actionTaken=";
			sendToDoList(params)
			clearInterval(getToDoListInterval);
			getToDoListInterval = setInterval( function() { getToDoList() }, 5000);
		}
	});

	$('#toDoListCompletedForm').submit(function(e) {
		e.preventDefault();
		
		var itemID = $('#toDoListCompletedForm #itemID').val();
		var isChecked = $('#toDoListCompletedForm #isChecked').val();
		var actionTaken = $('#toDoListCompletedForm #txtActionTaken').val();

		var params = "itemID="+itemID.replace('task','')+"&isChecked="+isChecked+"&actionTaken="+actionTaken;
		sendToDoList(params)
		clearInterval(getToDoListInterval);
		getToDoListInterval = setInterval( function() { getToDoList() }, 5000);
		$('#toDoListCompletedForm #txtActionTaken').val('');
	});
	
	function sendToDoList(params) {
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'add-to-do-list.php', true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhr.onload = function(){
			getToDoList();
		}

		xhr.send(params);
	}
}); 