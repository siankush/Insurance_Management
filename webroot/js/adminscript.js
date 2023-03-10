var csrfToken = $('meta[name="csrfToken"]').attr('content');
$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
    }
});
var ak = $.noConflict();
ak(document).on("click", ".delete-user-info", function(){
    
    var formData = $(this).attr("deleteuser-id");
    var statusData = $(this).attr("status-id");

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
       ak.ajax({
           url: "http://localhost:8765/admin/Users/deleteuser",
           data: {'id':formData, 'deleted': statusData},
           type: "JSON",
           method: "post",
           success:function(response){
             swal("Done!","It was succesfully deleted!","success");
             var dataArr = JSON.parse(response);
             if(dataArr.status ==1 ){
               ak("#data"+formData).hide();
   
             }
           }
       }).done(function(data) {
           swal("Deleted!", "Data successfully Deleted!", "success");
         })
         .error(function(data) {
           swal("Oops", "We couldn't connect to the server!", "error");
         })
     }
 )   
 
});


ak(document).on("click", ".get-userinfo", function(){
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
    ak.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
    
    var formData = $(this).attr("edituser-id");
    
    
    ak.ajax({
        url: "http://localhost:8765/admin/users/getuser",
        method: "get",
        data: {'id':formData},
        type: "JSON",
        success:function(response){
            // alert(response);
            
        userlisting = $.parseJSON(response);
               
             $('#first_name').val(userlisting['first_name']);
             $('#last_name').val(userlisting['last_name']);
             // $('#brand').val(car['brand']['name']);
             $('#email').val(userlisting['email']);
             $('#contact_number').val(userlisting['contact_number']);
             $('#address').val(userlisting['address']);
             $('#userlisting_id').val(userlisting['id']);
  
      }
    });
  });

  ak(document).on("click", ".edit-user", function(e){
      e.preventDefault();
      var csrfToken = $('meta[name="csrfToken"]').attr('content');
      ak.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
        // var formData = new FormData(form);
        var formData = $("#formid").serialize();
       
     
    //  alert(formData);
    ak.ajax({
   
      url: "http://localhost:8765/admin/users/edit",
      type: "JSON",
      method: "POST",
      data: formData,
      success: function (response) {
    
         var data = JSON.parse(response);
        // alert(data);
        
           if (data['status'] == 0) {
                alert(data['message']);
            } else {
             swal("Good job!", "The contactlisting has been saved!", "success");
   
              }
               ak('#change-status').load('/admin/users/ #change-status');
                 ak('#myModal').hide();
                 ak('.modal-backdrop').remove();
   
                   }
                  });
                  // return false;
   });
// var csrfToken = $('meta[name="csrfToken"]').attr('content');
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
//         }
//     });
//     var ak = $.noConflict();

    ak(document).on("click", ".delete-insurance-company", function(){
        var formData = $(this).attr("deleteinsurance-id");
        var statusData = $(this).attr("status-id");
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
              ak.ajax({
                  url: "http://localhost:8765/insurance-companies/delete",
                  data: {'id':formData, 'deleted': statusData},
                  type: "JSON",
                  method: "post",
                  success:function(response){
                    swal("Done!","It was succesfully deleted!","success");
                    var dataArr = JSON.parse(response);
                    if(dataArr.status ==1 ){
                      ak("#data"+formData).hide();
          
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

  ak(document).on("click", ".get-companyinfo", function(){
      var csrfToken = $('meta[name="csrfToken"]').attr('content');
      ak.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
        
    var formData = $(this).attr("editcompany-id");

    
    
    ak.ajax({
        url: "http://localhost:8765/insurance-companies/getcompany",
        method: "get",
        data: {'id':formData},
        type: "JSON",
        success:function(response){
            // alert(response);
            
        companylisting = $.parseJSON(response);
               
             $('#name').val(companylisting['name']);
             // $('#brand').val(car['brand']['name']);
             $('#companylisting_id').val(companylisting['id']);
  
      }
    });
  });

  ak(document).on("click", ".edit-company", function(e){
      e.preventDefault();
      var csrfToken = $('meta[name="csrfToken"]').attr('content');
      ak.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
        // var formData = new FormData(form);
     var formData = $("#formid").serialize();
       
     
    //  alert(formData);
    ak.ajax({
   
      url: "http://localhost:8765/insurance-companies/edit",
      type: "JSON",
      method: "POST",
      data: formData,
      success: function (response) {
    
         var data = JSON.parse(response);
        // alert(data);
        
           if (data['status'] == 0) {
                alert(data['message']);
            } else {
             swal("Good job!", "The contactlisting has been saved!", "success");
   
              }
              ak('#myModalcompany').hide();
               ak('#change-status').load('/insurance-companies/index #change-status');
                 ak('.modal-backdrop').remove();
   
                   }
                  });
                  // return false;
   });

  ak(document).on("click", ".delete-insurance-policy", function(){
      var formData = $(this).attr("deletepolicy-id");
      var statusData = $(this).attr("status-id");
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
          ak.ajax({
              url: "http://localhost:8765/insurance-policies/delete",
              data: {'id':formData, 'deleted': statusData},
              type: "JSON",
              method: "post",
              success:function(response){
                swal("Done!","It was succesfully deleted!","success");
                var dataArr = JSON.parse(response);
                if(dataArr.status ==1 ){
                  ak("#data"+formData).hide();
      
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


ak(document).on("click", ".get-policyinfo", function(){
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
    ak.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
    
    var formData = $(this).attr("editpolicy-id");

  
  
  ak.ajax({
      url: "http://localhost:8765/insurance-policies/getpolicy",
      method: "get",
      data: {'id':formData},
      type: "JSON",
      success:function(response){

          // alert(response);
          
      policylisting = $.parseJSON(response);
             
           $('#insurance_id').val(policylisting['insurance_company_id']);
           $('#name').val(policylisting['name']);
           $('#premium').val(policylisting['premium']);
           // $('#brand').val(car['brand']['name']);
           $('#policylisting_id').val(policylisting['id']);
          //  $('#image').val(policylisting['image']);
          document.getElementById('image-preview').src = data.image_url;

         
    }
  });
});

ak(document).on("click", ".edit-policy", function(e){
    e.preventDefault();
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
    ak.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
          }
      });
      var formData = new FormData($('#insuranceform')[0]);


  //  var formData = $("#formid").serialize();

   
  //  alert(formData);
  ak.ajax({
 
    url: "http://localhost:8765/insurance-policies/edit",
    type: "JSON",
    method: "POST",
    cache: false,
    processData: false,
    contentType: false,
    data: formData,
    success: function (response) {
  
       var data = JSON.parse(response);
      // alert(data);
      
         if (data['status'] == 0) {
              alert(data['message']);
          } else {
           swal("Good job!", "The contactlisting has been saved!", "success");
 
            }
             ak('#change-status').load('/insurance-policies/index #change-status');
               ak('#myModalpolicy').hide();
               ak('.modal-backdrop').remove();
 
                 }
                });
                // return false;
 });