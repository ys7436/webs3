    $(".model").click(function(){return model(this)});
    //提交表单
    function model(that, actionUrl, callback){
        //读取信息
        var hiddenForm = new FormData();
        var form = $(that).parents('.form');
        if (!actionUrl) actionUrl = form.attr("action");
        var flag = 0;
        form.find('input,textarea,select').each(function(i){
            if (this.type=="file") {
                hiddenForm.append(this.name, this.files[0])
            }else if(this.type == 'checkbox'){
            }else if(this.type == 'radio'){
                hiddenForm.append(this.name, this.checked);
            } else {
                if (this.name == "realname" && this.value == "") {
                    alert("请填写姓名");
                    this.focus();
                    return false;
                } else if (this.name == "phone") {

                    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;

                    if (this.value == "") {
                        alert("请填写手机号");
                        this.focus();
                        return false;

                    } else if(!myreg.test(this.value)) {

                        alert("手机号格式不正确");
                        this.focus();
                        return false;
                    }
                } else if (this.name == "province" && this.value == "") {
                    alert("请选择省份");
                    this.focus();
                    return false;
                } else if (this.name == "city" && this.value == "") {
                    alert("请选择城市");
                    this.focus();
                    return false;
                }
                flag++;
                hiddenForm.append(this.name, this.value);
            }
        })

        // form.submit();


        $(that).attr('disabled',true);//按钮锁定


        if (flag == 4) {
            $.ajax({
             url  : actionUrl,
             type : "post",
             dataType : 'text',
             data : hiddenForm,
             cache: false,
             processData: false,
             contentType: false,
             error : function(){
                $(".bg").show();
                $(".confirm").show();

                /*form.find('input,textarea,select').each(function(i){
                    this.value = '';
                })*/
            }
            })
        };
        return false;
    }
