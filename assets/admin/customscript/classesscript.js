$(document).ready(function(){
    
 $("#addnewclass").submit(function(event) {
     var formdata= $("#addnewclass").serializeArray();
         var formObj = {};
         $.each(formdata, function (i, input) {
        formObj[input.name] = input.value;
    });
  var classname=$("#classname11").val();
       $.ajax({
          method: "POST",
           url: "http://netin.crystalbiltech.com/xamarine/admin/catagory/addclass",
          data: formObj,
       }).then(function(sucess){
          var sucess= $.parseJSON(sucess);
            if(sucess['true']==1){
               location.reload();
           }
          event.preventDefault();
       }, function(error){
          console.log(error)
       })
  event.preventDefault();
});

$("#addnewsubject").submit(function(event) {
     var formdata= $("#addnewsubject").serializeArray();
         var formObj = {};
         $.each(formdata, function (i, input) {
        formObj[input.name] = input.value;
    });
 $.ajax({
          method: "POST",
           url: "http://netin.crystalbiltech.com/xamarine/admin/catagory/addsubject",
          data: formObj,
       }).then(function(sucess){
        var sucess= $.parseJSON(sucess);
            if(sucess['true']==1){
               location.reload();
           }
          event.preventDefault();
       }, function(error){
          console.log(error)
       })
  event.preventDefault();
});

$("#addnewqa").submit(function(event){
    var formdata= $("#addnewqa").serializeArray();
         var formObj = {};
         $.each(formdata, function (i, input) {
        formObj[input.name] = input.value;
    });
    $.ajax({
         method: "POST",
           url: "http://netin.crystalbiltech.com/xamarine/admin/catagory/addqa",
          data: formObj,
     }).then(function(sucess){
         console.log(sucess)
          var sucess= $.parseJSON(sucess);
            if(sucess['true']==1){
               location.reload();
           }
          event.preventDefault();
     }, function(error){
         console.log(error)
     })
  console.log(formObj);
    event.preventDefault();
    
})

$("#selectquotes").submit(function(event){
var formdata= $("#selectquotes").serializeArray();
         var formObj = {};
         $.each(formdata, function (i, input) {
        formObj[input.name] = input.value;
    });
    console.log(formObj);
    $.ajax({
        method: "POST",
        url: "http://netin.crystalbiltech.com/xamarine/admin/author/todayquote",
        data: formObj,
    }).then(function(success){
        var sucess= $.parseJSON(success);
         console.log(sucess);
            if(sucess['true']==1){
               location.reload();
           }
    }, function(error){
        console.log(error)
    })
    
    
    
    
    
     event.preventDefault();
}) 
$("#addcategory").submit(function(event){
    var formdata= $("#addcategory").serializeArray();
         var formObj = {};
         $.each(formdata, function (i, input) {
        formObj[input.name] = input.value;
    });
    console.log(formObj);
    $.ajax({
        method: "POST",
        url: "http://netin.crystalbiltech.com/xamarine/admin/ebookctrl/savecategory",
        data: formObj,
    }).then(function(success){
         var sucess= $.parseJSON(success);
           if(sucess['true']==1){
               location.reload();
           }
        console.log(success)
    }, function(error){
        console.log(error)
    })
     event.preventDefault();
})

$("#addteachercategory").submit(function(event){
    alert("sfsd")
    var formdata=$("#addteachercategory").serializeArray();
    var formObj={};
     $.each(formdata, function (i, input) {
        formObj[input.name] = input.value;
    });
    console.log(formObj);
    $.ajax({
        method: "POST",
        url: "http://netin.crystalbiltech.com/xamarine/admin/teacher/savecat",
        data: formObj
    }).then(function(success){
        if(success['true']==1){
               location.reload();
           }
    }, function(error){
    console.log(error);    
    })
    
    
    
      event.preventDefault();
})





    })


