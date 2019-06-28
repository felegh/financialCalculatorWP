// jQuery(document).ready(function($){
// $.(".submitChanges").onclick(function(){
//   var title = $.('#titleText').val();
//   $.post(my_ajax_obj.ajax_url, {
//     _ajax_nonce: my_ajax_obj.nonce,
//     action: "my_tag_count",
//     title: this.value
//   }, function(data) {
//     alert(data);
//   });
// });
// });
jQuery(document).ready(function($){
  jQuery('#submitForm').submit( function(e){
  var data = {
            'action': 'my_action',
            'dataText': document.getElementById('titleText').value,
  }
  jQuery.post(ajax_object.ajax_url, data, function(response){
        alert("Reposnse" + response);
        $(".timezone").html(response);
      });
      e.preventDefault();
  });
});
