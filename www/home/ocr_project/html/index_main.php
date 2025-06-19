<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>ocr main</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> <!-- 달력 스타일 -->
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/common.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/main.css"> 
    

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://poleji.cafe24.com/home/newfriend/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> <!-- 달력 스크립트 -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ko.js"></script> <!-- 달력 스크립트 -->
<?php
include('./php/connect_db.php');

$today = date("Y-m-d");
?>

<script>


</script>
</head>
<body>
    <div class="wrap">
        <div class="header">
        </div>
        <div class="body">
            <input type="file" id="imageInput" />
            <br />
            <img id="preview" style="max-width: 100%; margin-top: 10px;" />
            <canvas id="canvas" style="display:none;"></canvas>
            <pre id="output" style="white-space: pre-wrap; background: #f4f4f4; padding: 10px; margin-top: 10px;"></pre>
        </div>
        <div class="footer">

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@4/dist/tesseract.min.js"></script>
    <script type="text/javascript">
      const input = document.getElementById('imageInput');
      const canvas = document.getElementById('canvas');
      const ctx = canvas.getContext('2d');
      const output = document.getElementById('output');
      const preview = document.getElementById('preview');
      
      input.addEventListener('change', async (e) => {
		  const file = e.target.files[0];
		  const imageURL = URL.createObjectURL(file);
		  preview.src = imageURL;
		  
		  const img = new Image();
		  img.src = imageURL;
		  img.onload = async () => {
			  // 캔버스 설정
			  canvas.width = img.width;
			  canvas.height = img.height;
			  ctx.drawImage(img, 0, 0);
			  
			  // 전처리: 그레이스케일 + 간단한 이진화
			  const imageData = ctx.getImageData(0, 0, img.width, img.height);
			  const data = imageData.data;
			  for (let i = 0; i < data.length; i += 4) {
				  const avg = (data[i] + data[i + 1] + data[i + 2]) / 3;
				  const binary = avg < 128 ? 0 : 255;
				  data[i] = data[i + 1] = data[i + 2] = binary;
				}
				ctx.putImageData(imageData, 0, 0);
				
				// OCR: 한글 + 영어 동시 인식
				output.textContent = "텍스트 인식 중입니다...";
				const result = await Tesseract.recognize(canvas.toDataURL(), 'kor+eng');
				output.textContent = result.data.text;
			};
		});
</script>
</body>
</html> 