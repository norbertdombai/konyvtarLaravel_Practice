$(document).ready(function() {
    $('.delete-button').on('click', function() {
      var deleteButton = $(this);
      var konyvtarId = deleteButton.data('id');
      var apiEndPoint = '/delete/' + konyvtarId;
  
      $.ajax({
        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') },
        url: apiEndPoint,
        type: "DELETE",
        success: function(result) {
          console.log("Delete success");
          deleteButton.closest('tr').remove(); // Törli a sor elemét
        },
        error: function(xhr, status, error) {
          console.log("Delete error:", error);
        }
      });
    });
  });