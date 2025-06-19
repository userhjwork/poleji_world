$(document).ready(function() {
    const input = document.getElementById('imageInput');
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    const output = document.getElementById('output');
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('previewContainer');
    const loading = document.getElementById('loading');
    const resultContainer = document.getElementById('resultContainer');
    
    input.addEventListener('change', async (e) => {
        const file = e.target.files[0];
        if (!file) return;
        
        // 파일 유효성 검사
        if (!file.type.startsWith('image/')) {
            alert('이미지 파일만 선택할 수 있습니다.');
            return;
        }
        
        const imageURL = URL.createObjectURL(file);
        preview.src = imageURL;
        previewContainer.style.display = 'block';
        resultContainer.style.display = 'none';
        
        const img = new Image();
        img.src = imageURL;
        img.onload = async () => {
            // 캔버스 설정
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0);
            
            // 로딩 표시 시작
            loading.style.display = 'block';
            
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
            try {
                const startTime = performance.now();
                const result = await Tesseract.recognize(canvas.toDataURL(), 'kor+eng', {
                    logger: m => {
                        // 진행 상황을 콘솔에 출력 (선택사항)
                        if (m.status === 'recognizing text') {
                            console.log(`인식 진행률: ${Math.round(m.progress * 100)}%`);
                        }
                    }
                });
                const endTime = performance.now();
                const processingTime = (endTime - startTime) / 1000; // 초 단위
                
                // 로딩 표시 종료
                loading.style.display = 'none';
                
                // 결과 표시
                output.textContent = result.data.text || '인식된 텍스트가 없습니다.';
                resultContainer.style.display = 'block';
                
                // 결과를 서버에 저장
                saveOcrResult(result.data.text, processingTime, result.data.confidence);
                
                // 성공 메시지 표시
                showMessage('텍스트 인식이 완료되었습니다!', 'success');
                
            } catch (error) {
                // 로딩 표시 종료
                loading.style.display = 'none';
                
                // 오류 메시지 표시
                output.textContent = '텍스트 인식 중 오류가 발생했습니다: ' + error.message;
                resultContainer.style.display = 'block';
                showMessage('텍스트 인식에 실패했습니다.', 'error');
            }
        };
    });
    
    // OCR 결과를 서버에 저장
    function saveOcrResult(extractedText, processingTime, confidence) {
        $.ajax({
            url: './php/save_ocr_result.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                extracted_text: extractedText,
                processing_time: processingTime,
                confidence: confidence
            }),
            success: function(response) {
                console.log('OCR 결과 저장 완료');
            },
            error: function() {
                console.log('OCR 결과 저장 실패');
            }
        });
    }
    
    // 메시지 표시 함수
    function showMessage(message, type) {
        // 기존 메시지 제거
        $('.message-popup').remove();
        
        const messageClass = type === 'success' ? 'success' : 'error';
        const messageHtml = `
            <div class="message-popup ${messageClass}" style="
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 15px 20px;
                border-radius: 8px;
                color: white;
                font-weight: 500;
                z-index: 1000;
                animation: slideIn 0.3s ease-out;
                ${type === 'success' ? 'background: #28a745;' : 'background: #dc3545;'}
            ">
                ${message}
            </div>
        `;
        
        $('body').append(messageHtml);
        
        // 3초 후 메시지 제거
        setTimeout(() => {
            $('.message-popup').fadeOut(300, function() {
                $(this).remove();
            });
        }, 3000);
    }
    
    // 파일 업로드 영역 드래그 앤 드롭 기능
    const uploadArea = document.querySelector('.file-upload-area');
    
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#667eea';
        uploadArea.style.backgroundColor = 'rgba(102, 126, 234, 0.1)';
    });
    
    uploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#ddd';
        uploadArea.style.backgroundColor = 'transparent';
    });
    
    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#ddd';
        uploadArea.style.backgroundColor = 'transparent';
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            input.files = files;
            input.dispatchEvent(new Event('change'));
        }
    });
}); 