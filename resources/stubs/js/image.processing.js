(function(){
  if (typeof jQuery == "undefined") {
    alert('jQuery is not loaded');
  }

  var mode = '';
  var Cropper = window.Cropper;
  var Compressor = window.Compressor;
  var inputImage, cropperImage;
  var cropperOptions = {
    aspectRatio: 16 / 9,
  };
  var cropper, compressor;
  var originalWidth = 0;
  var originalHeight = 0;
  var originalRatio = 0;
  var outputWidth = 0;
  var outputHeight = 0;
  var isChangeWidth = false;
  var isChangeHeight = false;
  var compressorQuality = 0.8;
  var compressorOptions = {
    quality: compressorQuality,
  }

  function reset() {
    originalWidth = 0;
    originalHeight = 0;
    originalRatio = 0;
    outputWidth = 0;
    outputHeight = 0;
    isChangeWidth = false;
    isChangeHeight = false;
    compressorQuality = 0.8;
    compressorOptions = {
      quality: compressorQuality,
    }

    if (cropper) {
      cropper.destroy();
    }
    $('#imgproc-quality').val('0.8').change();
    $('#imgproc-width').val(originalWidth);
    $('#imgproc-height').val(originalHeight);

    $('#imgproc-result').show(500);
    $('#imgproc-container').hide(500);
    $('#imgproc-cropper-actions').hide(500);
    $('#imgproc-cropper-aspectratio').hide(500);
    $('#imgproc-compressor-options').hide(500);
    $('#imgproc-mode').show(500);
    $('#imgproc-action').hide(500);
  }
  
  function cropperInit() {
    cropperImage = $('#imgproc-container img').get()[0];
    cropper = new Cropper(cropperImage, cropperOptions);
  }
  
  $('[data-toggle="tooltip"]').tooltip();
  
  $('input[name="aspectRatio"]').on('change', function (e) {
    let target = e.currentTarget;        
    cropperOptions[target.name] = target.value;
    cropper.destroy();
    cropper = new Cropper(cropperImage, cropperOptions);
  });
  
  $('button[data-action="cropper"]').on('click', function(e) {
    let target = e.currentTarget;
    let method = $(target).data('method');
    let option = $(target).data('option');
    let secondOption = $(target).data('second-option') || 0;
    cropper[method](option, secondOption);
    
    if (method == 'scaleX' || method == 'scaleY') {
      $(target).data('option', option * -1);
    }
  });
  
  
  function compressorInit() {
    inputImage = $('#imgproc-input').get()[0].files[0];
    compressorOptions.success = function (result) {
      
      originalWidth = compressor.image.naturalWidth;
      originalHeight = compressor.image.naturalHeight;
      originalRatio = originalWidth / originalHeight;
      
      $('#imgproc-width').val(originalWidth);
      $('#imgproc-height').val(originalHeight);
    }
    compressor = new Compressor(inputImage, compressorOptions);
  }
  
  $('#imgproc-quality').on('change', function (e) {
    let target = e.currentTarget;
    compressorQuality = parseFloat(target.value);
  });
  
  $('#imgproc-width').on('keyup', function (e) {
    let target = e.currentTarget;
    isChangeWidth = true;
    outputWidth = target.value;
    outputHeight = Math.round(outputWidth / originalRatio);
    $('#imgproc-height').val(outputHeight);
  });

  $('#imgproc-height').on('keyup', function (e) {
    let target = e.currentTarget;
    isChangeHeight = true;
    outputHeight = target.value;
    outputWidth = Math.floor(outputHeight * originalRatio);
    $('#imgproc-width').val(outputWidth);
  });
  
  $('#imgproc-savechanges').on('click', function(e) {
    if (mode == 'crop') {
      let result = cropper.getCroppedCanvas();
      let imageUrl = result.toDataURL();
      $('#imgproc-editbtn img').attr('src',imageUrl);
      $('#imgproc-result img').attr('src',imageUrl);
      $('#imgproc-container img').attr('src',imageUrl);
      
      result.toBlob(function (blob) {
        let file = new File([blob], "cropped.png", {
          type:"image/png", lastModified:new Date().getTime()
        });
        let container = new DataTransfer();
        
        container.items.add(file);
        $('#imgproc-input').get()[0].files = container.files;
      });
      
      cropper.destroy();
    } else if (mode == 'resize') {
      compressorOptions.quality = compressorQuality;
      if (isChangeWidth) {
        compressorOptions.width = outputWidth;
      }
      if (isChangeHeight) {
        compressorOptions.height = outputHeight;
      }
      compressorOptions.success = function (result) {
      
        originalWidth = compressor.image.naturalWidth;
        originalHeight = compressor.image.naturalHeight;
        originalRatio = originalWidth / originalHeight;
        
        $('#imgproc-width').val(originalWidth);
        $('#imgproc-height').val(originalHeight);

        let imageUrl = URL.createObjectURL(result);
        $('#imgproc-editbtn img').attr('src',imageUrl);
        $('#imgproc-result img').attr('src',imageUrl);
        $('#imgproc-container img').attr('src',imageUrl);

        let file = new File([result], "resized.png", {
          type:"image/png", lastModified:new Date().getTime()
        });
        let container = new DataTransfer();
        
        container.items.add(file);
        $('#imgproc-input').get()[0].files = container.files;

      }
      compressor = new Compressor(inputImage, compressorOptions);
    }
    mode = '';
    $('#imgproc-result').show(500);
    $('#imgproc-container').hide(500);
    $('#imgproc-cropper-actions').hide(500);
    $('#imgproc-cropper-aspectratio').hide(500);
    $('#imgproc-compressor-options').hide(500);
    $('#imgproc-mode').show(500);
    $('#imgproc-action').hide(500);
  });

  $('#imgproc-cancel').on('click', function (e) {
    reset();
  });
  
  $('#imgproc-modecrop').on('click', function (e) {
    mode = 'crop';
    $('#imgproc-result').hide(500);
    $('#imgproc-container').show(500);
    $('#imgproc-cropper-actions').show(500);
    $('#imgproc-cropper-aspectratio').show(500);
    $('#imgproc-compressor-options').hide(500);
    $('#imgproc-mode').hide(500);
    $('#imgproc-action').show(500);
    setTimeout(() => cropperInit(), 800);
  });
  
  $('#imgproc-moderesize').on('click', function (e) {
    mode = 'resize';
    $('#imgproc-result').show(500);
    $('#imgproc-container').hide(500);
    $('#imgproc-cropper-actions').hide(500);
    $('#imgproc-cropper-aspectratio').hide(500);
    $('#imgproc-compressor-options').show(500);
    $('#imgproc-mode').hide(500);
    $('#imgproc-action').show(500);
    setTimeout(() => compressorInit(), 800);
  }); 

  
  $('#imgproc-input').on('change', function (e) {
    let fileURL = URL.createObjectURL(e.target.files[0]);
    $('#imgproc-editbtn img').attr('src',fileURL);
    $('#imgproc-result img').attr('src',fileURL);
    $('#imgproc-container img').attr('src',fileURL);
    $('#imgproc-edit').show();
  });
  
  $('#imgproc-editbtn').on('click', function (e) {
    $('#imgproc-modal').modal({
      show: true,
      keyboard: false,
      backdrop: 'static'
    });
  });

  $('body').on('hidden.bs.modal', '#imgproc-modal', function (event) {
    reset();
  });
  
})();
