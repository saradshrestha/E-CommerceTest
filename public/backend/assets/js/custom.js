
// Category Status Change
$(function() {
	    $('.toggle-class').change(function() {
	        var status = $(this).prop('checked') == true ? 1 : 0; 
	        var category_id = $(this).data('id');
	        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');         
        $.ajax({
            type: "post",
            dataType: "json",
            url: '/admin/category/changeStatus',
            data: {'status': status, 'category_id': category_id, '_token': CSRF_TOKEN},
            success: function(data){
              Swal.fire({
              		position:'top-end',
              		title: (data.success),
              		showConfirmButton: false,
              	});			
            }
        });
    })
})

//Product Status Change

      $('.toggle-class-product').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var product_id = $(this).data('id');
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');         
        $.ajax({
            type: "post",
            dataType: "json",
            url: '/admin/product/changeStatus',
            data: {'status': status, 'product_id': product_id, '_token': CSRF_TOKEN},
            success: function(data){
              Swal.fire({
                  position:'top-end',
                  title: (data.success),
                  showConfirmButton: false,
                });     
            }
        });
    })
