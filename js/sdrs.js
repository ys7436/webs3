var gfilter = {
        /**
     * invert color value of pixel, new pixel = RGB(255-r, 255-g, 255 - b)
     *
     * @param binaryData - canvas's imagedata.data
     * @param l - length of data (width * height of image data)
     */
    colorInvertProcess: function (context, canvasData) {

        for (var x = 0; x < canvasData.width; x++) // column
        {
            for (var y = 0; y < canvasData.height; y++) // row
            {
                // Index of the pixel in the array
                var idx = (x + y * canvasData.width) * 4;
                // assign new pixel value
                canvasData.data[idx + 0] = 255 - canvasData.data[idx + 0]; // Red channel
                canvasData.data[idx + 1] = 255 - canvasData.data[idx + 1];; // Green channel
                canvasData.data[idx + 2] = 255 - canvasData.data[idx + 2];; // Blue channel

            }
        }
    },

    /**
     * adjust color values and make it more darker and gray...
     *
     * @param binaryData
     * @param l
     */
    colorAdjustProcess: function (context, canvasData) {



        for (var x = 0; x < canvasData.width; x++) // column
        {
            for (var y = 0; y < canvasData.height; y++) // row
            {
                // Index of the pixel in the array
                var idx = (x + y * canvasData.width) * 4;
                // assign new pixel value
                var r = canvasData.data[idx + 0];
                var g = canvasData.data[idx + 1];
                var b = canvasData.data[idx + 2];

                canvasData.data[idx] = (r * 0.272) + (g * 0.534) + (b * 0.131);
                canvasData.data[idx + 1] = (r * 0.349) + (g * 0.686) + (b * 0.168);
                canvasData.data[idx + 2] = (r * 0.393) + (g * 0.769) + (b * 0.189);

            }
        }


        //for (var i = 0; i < len; i += 4) {
        //    var r = canvasData[i];
        //    var g = canvasData[i + 1];
        //    var b = canvasData[i + 2];

        //    canvasData[i] = (r * 0.272) + (g * 0.534) + (b * 0.131);
        //    canvasData[i + 1] = (r * 0.349) + (g * 0.686) + (b * 0.168);
        //    canvasData[i + 2] = (r * 0.393) + (g * 0.769) + (b * 0.189);
        //}

    },

    /**
     * deep clone image data of canvas
     *
     * @param context
     * @param src
     * @returns
     */
    copyImageData: function (context, src) {
        var dst = context.createImageData(src.width, src.height);
        dst.data.set(src.data);
        return dst;
    },

    /**
     * convolution - keneral size 5*5 - blur effect filter(模糊效果)
     *
     * @param context
     * @param canvasData
     */
    blurProcess: function (context, canvasData) {
        console.log("Canvas Filter - blur process");
        var tempCanvasData = this.copyImageData(context, canvasData);
        var sumred = 0.0, sumgreen = 0.0, sumblue = 0.0;
        for (var x = 0; x < tempCanvasData.width; x++) {
            for (var y = 0; y < tempCanvasData.height; y++) {

                // Index of the pixel in the array
                var idx = (x + y * tempCanvasData.width) * 4;
                for (var subCol = -2; subCol <= 2; subCol++) {
                    var colOff = subCol + x;
                    if (colOff < 0 || colOff >= tempCanvasData.width) {
                        colOff = 0;
                    }
                    for (var subRow = -2; subRow <= 2; subRow++) {
                        var rowOff = subRow + y;
                        if (rowOff < 0 || rowOff >= tempCanvasData.height) {
                            rowOff = 0;
                        }
                        var idx2 = (colOff + rowOff * tempCanvasData.width) * 4;
                        var r = tempCanvasData.data[idx2 + 0];
                        var g = tempCanvasData.data[idx2 + 1];
                        var b = tempCanvasData.data[idx2 + 2];
                        sumred += r;
                        sumgreen += g;
                        sumblue += b;
                    }
                }

                // calculate new RGB value
                var nr = (sumred / 25.0);
                var ng = (sumgreen / 25.0);
                var nb = (sumblue / 25.0);

                // clear previous for next pixel point
                sumred = 0.0;
                sumgreen = 0.0;
                sumblue = 0.0;

                // assign new pixel value
                canvasData.data[idx + 0] = nr; // Red channel
                canvasData.data[idx + 1] = ng; // Green channel
                canvasData.data[idx + 2] = nb; // Blue channel
                canvasData.data[idx + 3] = 255; // Alpha channel
            }
        }
    },

    /**
     * after pixel value - before pixel value + 128
     * 浮雕效果
     */
    fudiaoProcess: function (context, canvasData) {
        console.log("Canvas Filter - relief process");
        var tempCanvasData = this.copyImageData(context, canvasData);
        for (var x = 1; x < tempCanvasData.width - 1; x++) {
            for (var y = 1; y < tempCanvasData.height - 1; y++) {

                // Index of the pixel in the array
                var idx = (x + y * tempCanvasData.width) * 4;
                var bidx = ((x - 1) + y * tempCanvasData.width) * 4;
                var aidx = ((x + 1) + y * tempCanvasData.width) * 4;

                // calculate new RGB value
                var nr = tempCanvasData.data[aidx + 0] - tempCanvasData.data[bidx + 0] + 128;
                var ng = tempCanvasData.data[aidx + 1] - tempCanvasData.data[bidx + 1] + 128;
                var nb = tempCanvasData.data[aidx + 2] - tempCanvasData.data[bidx + 2] + 128;
                nr = (nr < 0) ? 0 : ((nr > 255) ? 255 : nr);
                ng = (ng < 0) ? 0 : ((ng > 255) ? 255 : ng);
                nb = (nb < 0) ? 0 : ((nb > 255) ? 255 : nb);

                // assign new pixel value
                canvasData.data[idx + 0] = nr; // Red channel
                canvasData.data[idx + 1] = ng; // Green channel
                canvasData.data[idx + 2] = nb; // Blue channel
                canvasData.data[idx + 3] = 255; // Alpha channel
            }
        }
    },

    /**
     *  before pixel value - after pixel value + 128
     *  雕刻效果
     *
     * @param canvasData
     */
    diaokeProcess: function (context, canvasData) {
        console.log("Canvas Filter - process");
        var tempCanvasData = this.copyImageData(context, canvasData);
        for (var x = 1; x < tempCanvasData.width - 1; x++) {
            for (var y = 1; y < tempCanvasData.height - 1; y++) {

                // Index of the pixel in the array
                var idx = (x + y * tempCanvasData.width) * 4;
                var bidx = ((x - 1) + y * tempCanvasData.width) * 4;
                var aidx = ((x + 1) + y * tempCanvasData.width) * 4;

                // calculate new RGB value
                var nr = tempCanvasData.data[bidx + 0] - tempCanvasData.data[aidx + 0] + 128;
                var ng = tempCanvasData.data[bidx + 1] - tempCanvasData.data[aidx + 1] + 128;
                var nb = tempCanvasData.data[bidx + 2] - tempCanvasData.data[aidx + 2] + 128;
                nr = (nr < 0) ? 0 : ((nr > 255) ? 255 : nr);
                ng = (ng < 0) ? 0 : ((ng > 255) ? 255 : ng);
                nb = (nb < 0) ? 0 : ((nb > 255) ? 255 : nb);

                // assign new pixel value
                canvasData.data[idx + 0] = nr; // Red channel
                canvasData.data[idx + 1] = ng; // Green channel
                canvasData.data[idx + 2] = nb; // Blue channel
                canvasData.data[idx + 3] = 255; // Alpha channel
            }
        }
    },

    /**
     * mirror reflect
     *
     * @param context
     * @param canvasData
     */
    mirrorProcess: function (context, canvasData) {
        console.log("Canvas Filter - process");
        var tempCanvasData = this.copyImageData(context, canvasData);
        for (var x = 0; x < tempCanvasData.width; x++) // column
        {
            for (var y = 0; y < tempCanvasData.height; y++) // row
            {

                // Index of the pixel in the array
                var idx = (x + y * tempCanvasData.width) * 4;
                var midx = (((tempCanvasData.width - 1) - x) + y * tempCanvasData.width) * 4;

                // assign new pixel value
                canvasData.data[midx + 0] = tempCanvasData.data[idx + 0]; // Red channel
                canvasData.data[midx + 1] = tempCanvasData.data[idx + 1]; // Green channel
                canvasData.data[midx + 2] = tempCanvasData.data[idx + 2]; // Blue channel



            }
        }
    },


 /**
 * 瞬动1985怀旧风.
 *
 * @param context
 * @param canvasData
 * @param 怀旧类型
 */
 shsd1985Process: function (context, canvasData, type) {

        var processAB = new Array ( 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 64, 65, 66, 68, 69, 70, 71, 72, 73, 75, 76, 77, 78, 79, 80, 82, 83, 84, 85, 86, 87, 89, 90, 91, 92, 93, 95, 96, 97, 98, 99, 100, 102, 103, 104, 105, 106, 107, 109, 110, 111, 112, 113, 115, 116, 117, 118, 119, 120, 122, 123, 124, 125, 126, 127, 129, 130, 131, 132, 133, 134, 136, 137, 138, 139, 139, 140, 142, 143, 144, 145, 146, 147, 149, 150, 151, 152, 153, 154, 156, 157, 158, 159, 160, 161, 163, 164, 165, 166, 167, 169, 170, 171, 172, 173, 174, 176, 177, 178, 179, 180, 181, 183, 184, 185, 186, 187, 189, 190, 191, 192, 193, 194, 196, 197, 198, 199, 200, 201, 203, 204, 205, 206, 207, 208, 210, 211, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212, 212 );//
        var processAG = new Array ( 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 73, 73, 74, 75, 76, 77, 78, 79, 80, 81, 83, 84, 85, 85, 86, 87, 88, 89, 90, 91, 93, 94, 95, 96, 96, 97, 98, 99, 100, 102, 103, 104, 105, 106, 107, 108, 108, 109, 110, 112, 113, 114, 115, 116, 117, 118, 119, 120, 120, 122, 123, 124, 125, 126, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 142, 143, 143, 144, 145, 146, 147, 148, 149, 150, 152, 153, 154, 155, 155, 156, 157, 158, 159, 160, 162, 163, 164, 165, 166, 167, 167, 168, 169, 170, 172, 173, 174, 175, 176, 177, 178, 179, 179, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 199, 200, 202, 202, 203, 204, 205, 206, 207, 208, 209, 210, 212, 213, 214, 214, 215, 216, 217, 218, 219, 221, 222, 223, 224, 225, 226, 226, 227, 228, 229, 231, 232, 233, 234, 235, 236, 237, 237, 238, 239, 241, 242, 243, 244, 245, 246, 247, 248, 249, 249, 251, 252, 253, 254 );//
        var processAR = new Array ( 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 81, 82, 84, 84, 85, 86, 88, 88, 89, 91, 92, 93, 93, 95, 96, 97, 98, 99, 100, 101, 103, 103, 104, 106, 107, 107, 108, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 121, 121, 122, 123, 125, 126, 126, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 140, 140, 141, 143, 144, 145, 145, 147, 148, 149, 150, 151, 152, 154, 154, 155, 156, 158, 159, 159, 161, 162, 163, 164, 164, 165, 166, 167, 168, 169, 170, 171, 173, 173, 174, 176, 177, 178, 178, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 191, 192, 192, 193, 195, 196, 196, 198, 199, 200, 201, 202, 203, 204, 206, 206, 207, 208, 210, 210, 211, 213, 214, 215, 215, 217, 218, 219, 220, 221, 222, 223, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225, 225 );//
        var tmpcanvasData = this.copyImageData(context, canvasData);

        for (var y = 0; y < canvasData.height; y++) // row
        {
            for (var x = 0; x < canvasData.width; x++) // column
            {

                // Index of the pixel in the array
                var idx = (x + y * canvasData.width) * 4;
                // assign new pixel value
                switch (type) {
                    case 'rgb':
                        canvasData.data[idx + 0] = processAR[tmpcanvasData.data[idx + 0]]; // Red channel
                        canvasData.data[idx + 1] = processAG[tmpcanvasData.data[idx + 1]]; // Green channel
                        canvasData.data[idx + 2] = processAB[tmpcanvasData.data[idx + 2]]; // Blue channel
                        break;
                    case 'r':
                        canvasData.data[idx + 0] = processAR[tmpcanvasData.data[idx + 0]]; // Red channel

                        break;
                    case 'g':
                        canvasData.data[idx + 1] = processAG[tmpcanvasData.data[idx + 1]]; // Green channel
                        break;
                    case 'b':
                        canvasData.data[idx + 2] = processAB[tmpcanvasData.data[idx + 2]]; // Blue channel
                        break;
                    case 'rg':
                        canvasData.data[idx + 0] = processAR[tmpcanvasData.data[idx + 0]]; // Red channel
                        canvasData.data[idx + 1] = processAG[tmpcanvasData.data[idx + 1]]; // Green channel
                        break;
                    case 'gb':
                        canvasData.data[idx + 1] = processAG[tmpcanvasData.data[idx + 1]]; // Green channel
                        canvasData.data[idx + 2] = processAB[tmpcanvasData.data[idx + 2]]; // Blue channel
                        break;
                    case 'br':
                        canvasData.data[idx + 0] = processAR[tmpcanvasData.data[idx + 0]]; // Red channel
                        canvasData.data[idx + 2] = processAB[tmpcanvasData.data[idx + 2]]; // Blue channel
                        break;
                    case 'gbr':
                        canvasData.data[idx + 0] = processAG[tmpcanvasData.data[idx + 0]]; // Red channel
                        canvasData.data[idx + 1] = processAB[tmpcanvasData.data[idx + 1]]; // Green channel
                        canvasData.data[idx + 2] = processAR[tmpcanvasData.data[idx + 2]]; // Blue channel
                    case 'brg':
                        canvasData.data[idx + 0] = processAB[tmpcanvasData.data[idx + 0]]; // Red channel
                        canvasData.data[idx + 1] = processAR[tmpcanvasData.data[idx + 1]]; // Green channel
                        canvasData.data[idx + 2] = processAG[tmpcanvasData.data[idx + 2]]; // Blue channel


                    default:

                }
               // canvasData.data[idx + 0] ;//= processAR[tmpcanvasData.data[idx + 0]]; // Red channel
               // canvasData.data[idx + 1] ;//= processAG[tmpcanvasData.data[idx + 1]]; // Green channel
               // canvasData.data[idx + 2] = processAB[tmpcanvasData.data[idx + 2]]; // Blue channel
               //// canvasData.data[midx + 3] = 255; // Alpha channel

            }
        }
    },


 ModeSmoothLight: function ( basePixel,  mixPixel)
{
    var res = 0;
    res = mixPixel > 128 ? (basePixel + (mixPixel + mixPixel - 255.0) * ((Math.sqrt(basePixel / 255.0)) * 255.0 - basePixel) / 255.0) :
    ((basePixel + (mixPixel + mixPixel - 255.0) * (basePixel - basePixel * basePixel / 255.0) / 255.0));


    return Math.min(255, Math.max(0, res));
},

 /**
 * 瞬动折痕旧照片效果...
 *
 * @param context
 * @param canvasData
  * @param maskimgData
 */
    shsdoldpicProcess: function (context, canvasData, maskimgData) {


        var b = 0, g = 0, r = 0, gray = 0;
        var alpha = 0.9;
        for (var y = 0; y < canvasData.height; y++) // row
        {
            for (var x = 0; x < canvasData.width; x++) // column
            {

                // Index of the pixel in the array
                var idx = (x + y * canvasData.width) * 4;

                gray = (canvasData.data[idx + 0] + canvasData.data[idx + 1] + canvasData.data[idx + 2]) / 3;

                b = this.ModeSmoothLight(gray, 10);
                g = this.ModeSmoothLight(gray, 120);
                r = this.ModeSmoothLight(gray, 200);


                //canvasData.data[idx + 0] = this.ModeSmoothLight(r, gray) ;  // Red channel
                //canvasData.data[idx + 1] = this.ModeSmoothLight(g, gray) ; // Green channel
                //canvasData.data[idx + 2] = this.ModeSmoothLight(b, gray) ; // Blue channel

                canvasData.data[idx + 0] = this.ModeSmoothLight(r, maskimgData.data[idx + 0]);  // Red channel
                canvasData.data[idx + 1] = this.ModeSmoothLight(g, maskimgData.data[idx + 1]); // Green channel
                canvasData.data[idx + 2] = this.ModeSmoothLight(b, maskimgData.data[idx + 2]); // Blue channel


            }
        }
    },

 /**
 * 瞬动暖黄旧照片效果...
 *
 * @param context
 * @param canvasData
 */
    shsdoldyellowProcess: function (context, canvasData) {


        var b = 0, g = 0, r = 0, gray = 0;
        var alpha = 0.9;
        for (var y = 0; y < canvasData.height; y++) // row
        {
            for (var x = 0; x < canvasData.width; x++) // column
            {

                // Index of the pixel in the array
                var idx = (x + y * canvasData.width) * 4;

                gray = (canvasData.data[idx + 0] + canvasData.data[idx + 1] + canvasData.data[idx + 2]) / 3;

                b = this.ModeSmoothLight(gray, 10);
                g = this.ModeSmoothLight(gray, 120);
                r = this.ModeSmoothLight(gray, 200);


                canvasData.data[idx + 0] = this.ModeSmoothLight(r, gray/2) ;  // Red channel
                canvasData.data[idx + 1] = this.ModeSmoothLight(g, gray/2) ; // Green channel
                canvasData.data[idx + 2] = this.ModeSmoothLight(b, gray/2) ; // Blue channel

            }
        }
    },

 /**
 * 瞬动折痕旧照片效果...
 *
 * @param context
 * @param canvasData
  * @param maskimgData
 */
    shsdoldguangProcess: function (context, canvasData, maskimgData) {


        var b = 0, g = 0, r = 0, gray = 0;
        var alpha = 0.9;
        for (var y = 0; y < canvasData.height; y++) // row
        {
            for (var x = 0; x < canvasData.width; x++) // column
            {

                // Index of the pixel in the array
                var idx = (x + y * canvasData.width) * 4;

                r = ((maskimgData.data[idx + 0] <= 128) ? (canvasData.data[idx + 0] * maskimgData.data[idx + 0] / 128) : (255 - (255 - canvasData.data[idx + 0]) * (255 - maskimgData.data[idx + 0]) / 128));
                r = Math.min(255, Math.max(0, r));
                g = ((maskimgData.data[idx + 1] <= 128) ? (canvasData.data[idx + 1] * maskimgData.data[idx + 1] / 128) : (255 - (255 - canvasData.data[idx + 1]) * (255 - maskimgData.data[idx + 1]) / 128));
                g = Math.min(255, Math.max(0, g));
                b = ((maskimgData.data[idx + 2] <= 128) ? (canvasData.data[idx + 2] * maskimgData.data[idx + 2] / 128) : (255 - (255 - canvasData.data[idx + 2]) * (255 - maskimgData.data[idx + 2]) / 128));
                b = Math.min(255, Math.max(0, b));

                canvasData.data[idx + 0] = r;  // Red channel
                canvasData.data[idx + 1] = g; // Green channel
                canvasData.data[idx + 2] = b; // Blue channel

            }
        }
    },

    /**
     * filter
     *
     * @param context
     * @param canvasData
     */
    doFilter: function (canvas, filtername,canshu) {


        var tempContext = canvas.getContext("2d");
        var len = canvas.width * canvas.height * 4;
        var canvasData = tempContext.getImageData(0, 0, canvas.width, canvas.height);

        switch (filtername) {
            case 'mirror':
                this.mirrorProcess(tempContext, canvasData);
                break;
            case 'diaoke':
                this.diaokeProcess(tempContext, canvasData);
                break;
            case 'fudiao':
                this.fudiaoProcess(tempContext, canvasData);
                break;
            case 'blur':
                this.blurProcess(tempContext, canvasData);
                break;
            case 'adjustcolor':
                this.colorAdjustProcess(tempContext, canvasData);
                break;
            case 'invertcolor':
                this.colorInvertProcess(tempContext, canvasData);
                break;
            case 'shsd1985':
                this.shsd1985Process(tempContext, canvasData, canshu);
                break;
            case 'shsdoldpic':
                this.shsdoldpicProcess(tempContext, canvasData, canshu);
                break;
            case 'shsdoldyellow':
                this.shsdoldyellowProcess(tempContext, canvasData);
                break;
            case 'shsdoldguang':
                this.shsdoldguangProcess(tempContext, canvasData, canshu);
                break;

            default:

        }

        tempContext.putImageData(canvasData, 0, 0);
    },



};


function invertColor() {
    var canvas = document.getElementById("target");
    gfilter.doFilter(canvas, 'invertcolor');
}

function adjustColor5(target) {
    if(target == undefined) {target="target";}
    var canvas = document.getElementById(target);
    gfilter.doFilter(canvas, 'adjustcolor');
}

function blurImage() {
    var canvas = document.getElementById("target");
    gfilter.doFilter(canvas, 'blur');
}

function fudiaoImage() {
    var canvas = document.getElementById("target");
    gfilter.doFilter(canvas, 'fudiao');
}

function kediaoImage() {
    var canvas = document.getElementById("target");
    gfilter.doFilter(canvas, 'diaoke');
}

function mirrorImage() {
    var canvas = document.getElementById("target");
    gfilter.doFilter(canvas, 'mirror');

}
function adjustColor1(target) {
    if(target == undefined) {target="target";}
    var canvas = document.getElementById(target);
    gfilter.doFilter(canvas, 'shsd1985', 'rgb');

}

function adjustColor3(target) {
    if(target == undefined) {target="target";}
    var canvas = document.getElementById(target);

    var maskcanvas = document.getElementById("maskcanvas");
    var maskpic = document.getElementById("oldpicmask");

    maskcanvas.width = canvas.width;
    maskcanvas.height = canvas.height;
    var maskctx = maskcanvas.getContext("2d");

    maskctx.drawImage(maskpic, 0, 0, canvas.width, canvas.height);

    var maskcanvasData = maskctx.getImageData(0, 0, maskcanvas.width, maskcanvas.height);

    gfilter.doFilter(canvas, 'shsdoldpic', gfilter.copyImageData(maskctx, maskcanvasData));
    document.getElementById("maskcanvas").style.display = "none";
}

function adjustColor4(target) {
    if(target == undefined) {target="target";}
    var canvas = document.getElementById(target);
    gfilter.doFilter(canvas, 'shsdoldyellow');
}

function adjustColor2(target) {
    if(target == undefined) {target="target";}
    var canvas = document.getElementById(target);

    var maskcanvas = document.getElementById("maskcanvas");
    var maskpic = document.getElementById("oldguangmask");

    maskcanvas.width = canvas.width;
    maskcanvas.height = canvas.height;
    var maskctx = maskcanvas.getContext("2d");

    maskctx.drawImage(maskpic, 0, 0, canvas.width, canvas.height);

    var maskcanvasData = maskctx.getImageData(0, 0, maskcanvas.width, maskcanvas.height);

    gfilter.doFilter(canvas, 'shsdoldguang', gfilter.copyImageData(maskctx, maskcanvasData));
    document.getElementById("maskcanvas").style.display = "none";
}