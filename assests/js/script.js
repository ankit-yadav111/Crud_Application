function openUpdateModal(id,title,desc,link,cat){
  var modal=document.getElementById("blogUpdateModal");
  modal.style.display = 'block';
  var modalTitle = document.getElementById("uTitle");
  var modalLink = document.getElementById("ulink");
  var modalDesc = document.getElementById("udescription");
  var modalCate = document.getElementById("ucategory");
  var modalId = document.getElementById("uid");


  console.log(id);

  modalId.value = id;
  modalTitle.value = title;
  modalLink.value = link;
  modalDesc.value = desc;
  for (var i = 0; i < modalCate.options.length; i++) {
    if (modalCate.options[i].value === cat) {
      modalCate.options[i].selected = true;
      break; // Exit the loop once the category is found
    }
  }

  
    window.onclick = function(event) {
      if (event.target === modal) {
        closeModal("blogUpdateModal");
      }
    };
  
}

function openModal(id) {
    var modalOverlay = document.getElementById(id);
    // console.log(dayId);
    modalOverlay.style.display = 'block';
  
    window.onclick = function(event) {
      if (event.target === modalOverlay) {
        closeModal(id);
      }
    };
  }
  
  // Function to close the modal
  function closeModal(id) {
    var modalOverlay = document.getElementById(id);
    if(id=="blogUpdateModal"){
      var modalTitle = document.getElementById("uTitle");
      var modalLink = document.getElementById("ulink");
      var modalDesc = document.getElementById("udescription");
      var modalCate = document.getElementById("ucategory");
      var modalId = document.getElementById("uid");
      modalId.value = "";
      modalTitle.value = "";
      modalLink.value = "";
      modalDesc.value = "";
      if(modalCate.options.length>0){
      modalCate.options[0].selected = true;}

    }
    else if(id=="blogModal"){
      var modalTitle = document.getElementById("title");
      var modalLink = document.getElementById("link");
      var modalDesc = document.getElementById("description");
      var modalCate = document.getElementById("blogCategory");
      modalTitle.value = "";
      modalLink.value = "";
      modalDesc.value = "";
      // console.log(modalCate);
      if(modalCate.options.length>0){
      modalCate.options[0].selected = true;
      }

    }
    else if(id=="userModal"){
      var userName = document.getElementById("name");
      var email = document.getElementById("email");
      var pass = document.getElementById("password");
      var type = document.getElementById("userType");

      userName.value = "";
      email.value = "";
      pass.value = "";
      if(type.options.length>0){
        type.options[0].selected = true;
      }

    }
    modalOverlay.style.display = 'none';
  }

  function deleteUser(email) {
    $.ajax({
        url: 'http://localhost/CRUD/User/deleteUser', 
        type: 'POST',
        data: { email: email },
        success: function(response) {
            location.reload()
        },
        error: function() {
            console.log('AJAX error:', arguments);
            alert('An error occurred during the AJAX request.');
        }
    });
}

function deleteBlog(id) {
  $.ajax({
      url: 'http://localhost/CRUD/Blog/deleteBlog', 
      type: 'POST',
      data: { id: id },
      success: function(response) {
          location.reload()
      },
      error: function() {
          console.log('AJAX error:', arguments);
          alert('An error occurred during the AJAX request.');
      }
  });
}


function deleteCategory(cate) {
  $.ajax({
      url: 'http://localhost/CRUD/Category/deleteCategory', 
      type: 'POST',
      data: { cate: cate },
      success: function(response) {
          location.reload()
      },
      error: function() {
          console.log('AJAX error:', arguments);
          alert('An error occurred during the AJAX request.');
      }
  });
}

// function blogByCategory(cate){
//   $.ajax({
//     url: 'http://localhost/CRUD/Welcome/blogsByCategory',
//     type: 'Post',
//     data: {cate: cate},
//     success: function(response){
//       // location.reload();
//       console.log(response.Category);
//     },
//     error: function(){
//       console.log('AJAX error:',arguments);
//       alert('An error occurred during the AJAX request.');
//     }
//   })
// }