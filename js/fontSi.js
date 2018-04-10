
//canvasid:canvas的id;imagetodraw:上传图片元素；mywords:获取文字；
function xiezi(mainCtx,mywords){

        //document.getElementById(canvasid).height = document.getElementById(canvasid).height;

        //var mainCtx = document.getElementById(canvasid).getContext("2d");
        // mainCtx.clearRct(0,0,750,1160);

        //mainCtx.drawImage(imagetodraw,0,0);
        // mainCtx.drawImage(imagetodraw,0,0,200,297);
        var dianx=new Array(143,143,143,143,143,143,93,93,93,93,93,93,43,43,43,43,43,43);
        var diany=new Array(816,851,886,921,956,992,816,851,886,921,956,992,816,851,886,921,956,992);
        /*
        var dianx=new Array(92,92,92,92,92,92,57,57,57,57,57,57,22,22,22,22,22,22);
        var diany=new Array(538,562,586,610,634,658,538,562,586,610,634,658,538,562,586,610,634,658);
         */
        var len=mywords.length;

            mainCtx.font = "lighter 30px Serif";
            //设置用户文本填充颜色
            mainCtx.fillStyle = "black";
            //绘制文字

        for (i=0;i<len;i++)
        {
            mainCtx.fillText(mywords.charAt(i),dianx[i],diany[i]);

        }

}
/*
var printLastPhotoBox = document.getElementById("printLastPhotoBox");
printLastPhotoBox.innerHTML = "";

var printLastPhoto = new Image;
var tt= printLastPhoto.src = document.getElementById(canvasid).toDataURL();
// printLastPhoto.id='imageupload-result2';
printLastPhotoBox.appendChild(printLastPhoto);*/

