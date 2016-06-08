$(document).ready(function () {
  var url_global = $(location).attr('protocol') + '//'+  $(location).attr('host') + '/laravel/lar_shop/public/';
  //alert(url_global);
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  $('[data-toggle="offcanvas"]').click(function () {
    $('.wapper-slidebar').toggleClass('show-slidebar');
   $('.wapper-content').toggleClass('content-hidden');
   $('.wapper-footer').toggleClass('footer-hidden');
  });


   $('#side-menu').metisMenu();
   $('.currency').maskMoney({precision:0});
   if($('.textarea-summernote'))
   {
     $('.textarea-summernote').summernote({
        height: 250,
        onImageUpload: function(files, editor, welEditable) {
                      sendFile(files[0], editor, welEditable);
                  }
     });
   }

   function sendFile(file, editor, welEditable) {
                var  data = new FormData();
                data.append("image", file);
                var url = url_global + 'admin/ajax/image';
                $.ajax({
                    data: data,
                    type: "POST",
                    url: url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        $(".textarea-summernote").summernote("insertImage", url); 
                    }
                });
            }

});

