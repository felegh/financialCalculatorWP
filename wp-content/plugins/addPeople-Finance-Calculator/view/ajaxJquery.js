jQuery(document).ready(function($){
  jQuery('#submitForm').submit( function(e){
  var data = {
            'action': 'my_action',
            'dataText': document.getElementById('titleText').value,
            'minimumRate' : document.getElementById('minimumRate').value,
            'mediumRate' : document.getElementById('mediumRate').value,
            'maximumRate' : document.getElementById('maximumRate').value,
            'year' : document.getElementById('yearly').value,
            'minimumBudget' :document.getElementById('minimumBudget').value,
            'maximumBudget' :document.getElementById('maximumBudget').value,
  }
  jQuery.post(ajax_object.ajax_url, data, function(response){
        alert("Reposnse" + response);
        $(".timezone").html(response);
      });
      e.preventDefault();
  });
});
