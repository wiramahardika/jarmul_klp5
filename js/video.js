$(document).ready(function() {

  $("#video").find("form").submit(function(e){
    e.preventDefault()
    var start_time = new Date().getTime()

    var submitBtn = $(this).find("button[type='submit']")
    submitBtn.button('loading')

    var form = new FormData()
    var data = $(this).serializeArray()
    $.each(data,function(key,input){
      form.append(input.name,input.value)
    });
    var fileToUpload = $(this).find("input[type='file']")[0].files[0]
    form.append('video', fileToUpload)

    var settings = {
      "async": true,
      "url": "videoconverter.php",
      "method": "POST",
      "processData": false,
      "contentType": false,
      "mimeType": "multipart/form-data",
      "data": form,
      error: function (xhr, responseData, textStatus) {
        alert(responseData)
      }
    }

    var promise = $.ajax(settings)

    promise.done(function(responseData, textStatus, xhr) {
      var speed = (new Date().getTime() - start_time) / 1000
      $('#download-file').find("a[name='download-link']").attr('href', responseData)
      $('#download-file').find("strong[name='speed']").html(speed)
      $('#download-file').modal('show')
      submitBtn.button('reset')
    })

  })

})
