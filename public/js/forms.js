$(document).ready(function(){
    // alert('i from forms.js');

    $('form').submit(function(e){
        e.preventDefault();
        
        $.notify($(this).attr('msg'), 'info');

        let url = $(this).attr('action');
        let type = $(this).attr('method');
        // let data = $(this).serializeArray();
        
        // alert(JSON.stringify(data));

            $.ajax({
                url: url, // Url to which the request is send
                type: type,             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: (data) => {
                    console.log(data);
                    res = JSON.parse(data);
                    // console.log(res);
                    if(res.status == 1){
                        $.notify(res.msg, 'success');
                        if(res.redirect){
                            if(res.redirect == 'reload'){
                                window.location.reload();
                            }else
                            if(res.redirect == 'noreload'){
                                
                            }else{
                                setTimeout(()=>{
                                    window.location.assign(res.redirect);
                                }, 500);
                            }
                        }
                    }else{
                        console.log(res);
                        $.notify(res.msg, 'error');
                    }
                },
                error: (error) => {
                    $.notify('An Error Occurred! Please try again later', 'error');
                    console.log(JSON.stringify(error));
                }
            });

        });

        $("#imagetoupload").change(function() {
            console.log("File have been changed");
            // $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                $('#previewing').attr('src','noimage.png');
                // $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                return false;
            }else{
                // console.log(this.files[0]);
                $('#image_preview').empty();
                $.each(this.files, (index, value)=>{
                    var imgtag = document.createElement('img');
                    var id = document.createAttribute('id');
                    var style = document.createAttribute('style');
                    id.value = 'prev'+index;
                    style.value = 'width: 200px; margin: 5px;';
                    imgtag.setAttributeNode(id);
                    imgtag.setAttributeNode(style);
                    $('#image_preview').append(imgtag);
                    console.log(imgtag);
                    var reader = new FileReader();
                    reader.onload = (e)=>{
                        console.log(e);
                        $('#image_preview').css("display", "block");
                        $('#prev'+index).attr('src', e.target.result);
                    };
                    reader.readAsDataURL(this.files[index])
                    // console.log();
                    // console.log(imgtag);
                });
                // this.files.forEach((element) => {
                //     console.log(element.name);
                // });
                
            }
        });

        $(".order_options").change(function(){
            // alert($(this).val());
            $.notify('Changing Order Status', 'info');
            let url = $(this).attr('url');
            var data = {
                'status':$(this).val(),
            }
            $.post(url, data, function(data){
                console.log(data);
                res = JSON.parse(data);
                // console.log(res);
                if(res.status == 1){
                    $.notify(res.msg, 'success');
                    if(res.redirect){
                        if(res.redirect == 'reload'){
                            window.location.reload();
                        }else
                        if(res.redirect == 'noreload'){
                            
                        }else{
                            setTimeout(()=>{
                                window.location.assign(res.redirect);
                            }, 500);
                        }
                    }
                }else{
                    $.notify(res.msg, 'error');
                }
            });
        });
    });