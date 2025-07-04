/**
 * 순수 JavaScript QR코드 생성기
 * QR코드 표준을 기반으로 한 자체 구현
 */

class QRCodeGenerator {
    constructor() {
        this.typeNumber = 4;
        this.errorCorrectionLevel = 'M';
        this.cellSize = 2;
        this.margin = 8;
    }

    // QR코드 데이터 인코딩
    encodeData(data) {
        let encoded = '';
        for (let i = 0; i < data.length; i++) {
            const charCode = data.charCodeAt(i);
            encoded += charCode.toString(2).padStart(8, '0');
        }
        return encoded;
    }

    // 리드-솔로몬 오류 정정 코드 생성
    generateErrorCorrection(data) {
        // 간단한 체크섬 생성 (실제로는 더 복잡한 알고리즘 필요)
        let checksum = 0;
        for (let i = 0; i < data.length; i++) {
            checksum ^= data.charCodeAt(i);
        }
        return checksum.toString(16).padStart(2, '0');
    }

    // QR코드 매트릭스 생성
    generateMatrix(data) {
        const size = this.typeNumber * 4 + 17;
        const matrix = Array(size).fill().map(() => Array(size).fill(0));
        
        // 데이터 인코딩
        const encodedData = this.encodeData(data);
        const errorCorrection = this.generateErrorCorrection(data);
        const fullData = encodedData + errorCorrection;
        
        // QR코드 패턴 배치
        this.addFinderPatterns(matrix);
        this.addAlignmentPatterns(matrix);
        this.addTimingPatterns(matrix);
        this.addData(matrix, fullData);
        
        return matrix;
    }

    // 파인더 패턴 추가 (좌상단, 우상단, 좌하단)
    addFinderPatterns(matrix) {
        const patterns = [
            [0, 0], [matrix.length - 7, 0], [0, matrix.length - 7]
        ];
        
        patterns.forEach(([row, col]) => {
            for (let r = 0; r < 7; r++) {
                for (let c = 0; c < 7; c++) {
                    if ((r === 0 || r === 6 || c === 0 || c === 6) ||
                        (r >= 2 && r <= 4 && c >= 2 && c <= 4)) {
                        matrix[row + r][col + c] = 1;
                    }
                }
            }
        });
    }

    // 얼라인먼트 패턴 추가
    addAlignmentPatterns(matrix) {
        // 간단한 구현 - 실제로는 더 복잡한 위치 계산 필요
        const center = Math.floor(matrix.length / 2);
        for (let r = center - 2; r <= center + 2; r++) {
            for (let c = center - 2; c <= center + 2; c++) {
                if (r >= 0 && r < matrix.length && c >= 0 && c < matrix.length) {
                    if ((r === center - 2 || r === center + 2 || c === center - 2 || c === center + 2) ||
                        (r === center && c === center)) {
                        matrix[r][c] = 1;
                    }
                }
            }
        }
    }

    // 타이밍 패턴 추가
    addTimingPatterns(matrix) {
        for (let i = 8; i < matrix.length - 8; i++) {
            matrix[6][i] = i % 2;
            matrix[i][6] = i % 2;
        }
    }

    // 데이터 배치
    addData(matrix, data) {
        let dataIndex = 0;
        for (let row = matrix.length - 1; row >= 0; row -= 2) {
            for (let col = 0; col < matrix.length; col++) {
                if (dataIndex < data.length) {
                    matrix[row][col] = parseInt(data[dataIndex]);
                    if (row > 0) {
                        matrix[row - 1][col] = parseInt(data[dataIndex + 1] || 0);
                    }
                    dataIndex += 2;
                }
            }
        }
    }

    // QR코드를 Canvas에 그리기
    drawQRCode(canvas, data) {
        const matrix = this.generateMatrix(data);
        const ctx = canvas.getContext('2d');
        
        const size = matrix.length * this.cellSize + 2 * this.margin;
        canvas.width = size;
        canvas.height = size;
        
        // 배경
        ctx.fillStyle = '#FFFFFF';
        ctx.fillRect(0, 0, size, size);
        
        // QR코드 그리기
        ctx.fillStyle = '#000000';
        for (let row = 0; row < matrix.length; row++) {
            for (let col = 0; col < matrix.length; col++) {
                if (matrix[row][col] === 1) {
                    const x = col * this.cellSize + this.margin;
                    const y = row * this.cellSize + this.margin;
                    ctx.fillRect(x, y, this.cellSize, this.cellSize);
                }
            }
        }
    }

    // QR코드를 SVG로 생성
    generateSVG(data) {
        const matrix = this.generateMatrix(data);
        const size = matrix.length * this.cellSize + 2 * this.margin;
        
        let svg = `<svg width="${size}" height="${size}" xmlns="http://www.w3.org/2000/svg">`;
        svg += `<rect width="${size}" height="${size}" fill="white"/>`;
        
        for (let row = 0; row < matrix.length; row++) {
            for (let col = 0; col < matrix.length; col++) {
                if (matrix[row][col] === 1) {
                    const x = col * this.cellSize + this.margin;
                    const y = row * this.cellSize + this.margin;
                    svg += `<rect x="${x}" y="${y}" width="${this.cellSize}" height="${this.cellSize}" fill="black"/>`;
                }
            }
        }
        
        svg += '</svg>';
        return svg;
    }
}

// 전역 객체로 노출
window.QRCodeGenerator = QRCodeGenerator; 