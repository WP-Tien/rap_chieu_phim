$(function() {
  // Fix Synchronous XMLHttpRequest
  $.ajaxPrefilter(function( options, originalOptions, jqXHR ) { 
    options.async = true; 
  });
  
  // $.get("view/phim_sap_chieu.php", function(html){
  //   //console.log(html);
  //   $('#content-sp').html(html);
  // });
  
  // Phim sap chieu phim dang chieu
  $('#content-sp').load("phim_dang_chieu.php");

  $('#tabs a').click(function() {
    //console.log(this.hash);
    var page = this.hash.substr(1);
    //console.log(page);
    //Tham so 1 duong dan, 2 tham so truyen, function hanh dong gi` do
    $.get(page+".php", function(html){
      //console.log(html);
      $('#content-sp').html(html);
    });
    // $.ajax({
    //       type: "GET",
    //       url: "view/"+page+".php",
    //       async: false,
    //       success: function(html){
    //           $("#content-sp").html(html);
    //       },
    //       error: function(){
    //           alert('Something went wrong ! Errr ...');
    //       }
    //   });
      return false;
    });

});