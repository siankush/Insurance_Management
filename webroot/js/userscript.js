$(document).on("click", ".delete-user", function(){
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
       $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
          }
        });
      var formData = $(this).attr("deleteuser-id");
      var statusData = $(this).attr("status-id");
      // alert(formData+statusData);
      // alert(formData);
      // var statusData = $(this).attr("status-id");
  
        swal({
        title: "Are you sure to delete this  of ?",
        text: "Delete Confirmation?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Delete",
        closeOnConfirm: false
        },
        function() {
              $.ajax({
                  url: "http://localhost:8765/ContactListings/delete",
                  data: {'id':formData, 'deletestatus': statusData},
                  type: "JSON",
                  method: "post",
                  success:function(response){
                    swal("Done!","It was succesfully deleted!","success");
                    var dataArr = JSON.parse(response);
                    if(dataArr.status ==1 ){
                      $("#data"+formData).hide();
          
                    }
                  }
              }).done(function(data) {
                  swal("Deleted!", "Data successfully Deleted!", "success");
                })
                .error(function(data) {
                  swal("Oops", "We couldn't connect to the server!", "error");
                });
                    }
        )
  });  
  
  $(document).on("click", ".edit-user", function(){
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
      }
    });
    
    var formData = $(this).attr("edituser-id");
    
    
    $.ajax({
      url: "http://localhost:8765/ContactListings/getuser",
      method: "get",
      data: {'id':formData},
      type: "JSON",
      success:function(response){
  
        contactsListing = $.parseJSON(response);
               
                  $('#name').val(contactsListing['name']);
                  // $('#brand').val(car['brand']['name']);
                  $('#email').val(contactsListing['email']);
                  $('#phone').val(contactsListing['phone']);
                  $('#address').val(contactsListing['address']);
                  $('#contactlist_id').val(contactsListing['id']);
  
      }
    });
  });
  
  $(document).on("click", ".edit-data", function(e){
    e.preventDefault();
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
      }
    });
    // var formData = new FormData(form);
     var formData = $("#formid").serialize();
     
    //  alert(formData);
    $.ajax({
   
      url: "http://localhost:8765/ContactListings/edituser",
      type: "JSON",
      method: "POST",
      data: formData,
      success: function (response) {
    
         var data = JSON.parse(response);
        // alert(data);
        
           if (data['status'] == 0) {
                // alert(data['message']);
            } else {
             swal("Good job!", "The contactlisting has been saved!", "success");
   
              }
               $('#change-status').load('/ContactListings/userlisting #change-status');
                 $('#myModal').hide();
                 $('.modal-backdrop').remove();
   
                   }
                  });
                  // return false;
   });