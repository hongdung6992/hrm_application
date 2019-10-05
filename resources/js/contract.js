$(document).ready(() => {

  $('.js-contract-table').DataTable({
    searching: false,
    bPaginate: false,
    bInfo: false,
    ordering: false,
  })

  // reset when close from
  $('#modal-edit-contract, #modal-create-contract').on('hide.bs.modal', () => {
    $('#js-contract-form')[0].reset();
    $('#js-contract-update')[0].reset();
    $('.message-error').remove();
  })


  // Nếu người dùng chọn Hợp đồng không xác định thời hạn thì ẩn form Ngày hết hiệu lực
  $('.contract-form select[name="contract_type_id"]').on('change', function () {
    let value = $(this).children("option:selected").val();
    if (value == 1) {
      $('.contract-form input[name="expiry_date"]').val('');
      $('.contract-form input[name="expiry_date"]').parent('.form-group').css('display', 'none');
    } else {
      $('.contract-form input[name="expiry_date"]').parent('.form-group').removeAttr('style');
    }
  })

  // create decision
  $('#modal-create-contract').on('show.bs.modal', e => {
    $('#js-contract-form')[0].reset();
    let url = $(e.relatedTarget).data('url');
    $(document).on('submit', '#js-contract-form', e => {
      let data = $(e.target).serialize();
      e.preventDefault();
      e.stopImmediatePropagation();
      $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "json",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
        },
        success: response => {
          console.log(response);
          if (response.status === 'success') {
            $('#modal-create-contract').modal('hide');
            $('#js-contract-form')[0].reset();
            $('.message-error').remove();
            toastr.success(response.flash_message);
            reloadData();
          } else if(response.status === 'error') {
            $('.message-error').remove();
            showErrorMessage(response.errors);
          }else{
            $('#modal-create-contract').modal('hide');
            toastr.warning(response.flash_message);
          }
        }
      });
    })
  })

  // update dicision
  $('#js-contract-update').on('submit', e => {
    e.preventDefault();
    let url = $(event.target).attr('action');
    let data = $(event.target).serialize();
    $.ajax({
      method: "PUT",
      url: url,
      data: data,
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function (response) {
        if (response.status === 'success') {
          $('#modal-edit-contract').modal('hide');
          $('#js-contract-update')[0].reset();
          $('.message-error').remove();
          toastr.success(response.flash_message);
          reloadData()
        } else if (response.status === 'error') {
          $('.message-error').remove();
          showErrorMessage(response.errors);
        }else{
          $('#modal-edit-contract').modal('hide');
          toastr.warning(response.flash_message);
        }
      }
    });
  })

  // show error message
  function showErrorMessage(data) {
    $.each(data, (key, value) => {
      let message = '<p class="message-error text-danger mt-1">' + value + '</p>'
      $('.contract-form input[name="' + key + '"]').next().remove();
      $('.contract-form select[name="' + key + '"]').next().remove();
      $('.contract-form input[name="' + key + '"]').after(message);
      $('.contract-form select[name="' + key + '"]').after(message);
    });
  }

  // get data contracts ajax
  function reloadData() {
    $.ajax({
      type: "GET",
      url: $('#contract').data('url'),
      dataType: "html",
      success: function (response) {
        $('.js-contract-table tbody').html(response);
      }
    });
  }
  reloadData();
})

// delete single contract
$(document).ready(() => {
  $('#modal-confirm-delete').on('show.bs.modal', e => {
    let url = $(e.relatedTarget).data('url');
    if (url.indexOf('contracts') > -1) {
      $('#confirm-delete').one('click', e => {
        $.ajax({
          type: 'DELETE',
          url: url,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
          },
          success: data => {
            $('#modal-confirm-delete').modal('hide');
            if (data.status === 'success') {
              $('button[data-id=' + data.id + ']').parents('tr').remove();
              toastr.success(data.flash_message);
            } else {
              toastr.warning(data.flash_message);
            }
          },
        });
      })
    }
  });
});

// get data edit
$(document).ready(() => {
  $('#modal-edit-contract').on('show.bs.modal', e => {
    $('.contract-form input[name="expiry_date"]').parent('.form-group').removeAttr('style');
    let url = $(e.relatedTarget).data('url');
    $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      success: response => {
        $.each(response, (key, value) => {
          $('#js-contract-update input[name="' + key + '"]').val(value);
          $('#js-contract-update select[name="' + key + '"]').val(value);
        });
      }
    });
  })
})

