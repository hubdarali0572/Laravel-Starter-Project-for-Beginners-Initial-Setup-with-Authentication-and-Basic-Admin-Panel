(function () {
  'use strict';

  function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text || '';
    return div.innerHTML;
  }

  window.confirmDelete = function (id, name) {
    if (typeof Swal === 'undefined') {
      console.error('SweetAlert2 is not loaded.');
      return;
    }

    const isDark = document.documentElement.classList.contains('dark');
    const recordName = name ? String(name).trim() : '';
    const hasRecord = recordName.length > 0;

    const recordHtml = hasRecord
      ? '<div class="admin-swal-record-name-only">' + escapeHtml(recordName) + '</div>'
      : '';

    Swal.fire({
      title: 'Are you sure?',
      html:
        recordHtml +
        '<p class="admin-swal-message">This record will be permanently deleted and cannot be recovered.</p>',
      icon: 'warning',
      iconColor: isDark ? '#fbbf24' : '#d97706',
      showCancelButton: true,
      confirmButtonText: '<i class="fas fa-trash-alt"></i> Delete',
      cancelButtonText: 'Cancel',
      reverseButtons: true,
      buttonsStyling: false,
      focusCancel: true,
      customClass: {
        popup: 'admin-swal-popup',
        title: 'admin-swal-title',
        htmlContainer: 'admin-swal-html',
        icon: 'admin-swal-icon',
        confirmButton: 'admin-swal-btn admin-swal-btn-danger',
        cancelButton: 'admin-swal-btn admin-swal-btn-cancel',
        actions: 'admin-swal-actions',
      },
    }).then((result) => {
      if (result.isConfirmed) {
        const form = document.getElementById('delete-form-' + id);
        if (form) {
          form.submit();
        }
      }
    });
  };

  document.addEventListener('click', function (event) {
    const button = event.target.closest('.js-confirm-delete');
    if (!button) {
      return;
    }

    event.preventDefault();

    const id = button.getAttribute('data-delete-id');
    const name = button.getAttribute('data-delete-name') || '';

    window.confirmDelete(id, name);
  });
})();
