$(function () {
  // Function to display the SweetAlert confirmation
  window.confirmDelete = function (id) {
    'use strict';

    // Trigger the SweetAlert2 confirmation
    Swal.fire({
      title: '<span class="swal-title">Are you sure you want to delete this record ?</span>',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#3d3c45',
      confirmButtonColor: '#ff5a00',
      confirmButtonText: 'DELETE !',
      cancelButtonText: 'ABORT !',
      reverseButtons: true,

      // Custom Popup Size + Style
      customClass: {
        popup: 'custom-swal-popup',
        title: 'custom-swal-title',
        htmlContainer: 'custom-swal-text'
      }
    }).then((result) => {

      if (result.isConfirmed) {
        $('#delete-form-' + id).submit();
      }
      else if (result.dismiss === Swal.DismissReason.cancel) {

        Swal.fire({
          title: '<span class="swal-title">Cancelled</span>',
          text: 'The record was not deleted.',
          icon: 'error',
          confirmButtonColor: "#ff5a00",
          customClass: {
            popup: 'custom-swal-popup',
            title: 'custom-swal-title',
            htmlContainer: 'custom-swal-text'
          }
        });

      }
    });
  };

});
