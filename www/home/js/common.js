function check_token(location='') {
     // 토큰 유효성 확인 절차
     let accessToken = localStorage.getItem('access_token');
     let refreshToken = localStorage.getItem('refresh_token');

     if (accessToken && refreshToken) {
         // access_token을 서버에 보내 유효성 확인
         fetch('/home/validate_token.php', {
             method: 'POST',
             headers: {
                 'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    access_token: accessToken
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.valid) {
                    console.log('토큰 유효: 로그인 유지됨');
                    console.log(data.valid);
                    // 토큰이 유효하면 로그인페이지에서는 데시보드로 이동
                    if (location == 'page_login') {
                        window.location.href = 'dashboard.php';
                    }

                } else {
                    console.log('토큰 만료: 새로운 토큰 요청');

                    console.log(data.valid);
                    
                    // 토큰이 만료되었으면 refresh_token으로 새 access_token 요청
                    fetch('/home/refresh_token.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            refresh_token: refreshToken
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.access_token && data.refresh_token) {
                            localStorage.setItem('access_token', data.access_token);
                            localStorage.setItem('refresh_token', data.refresh_token);

                            console.log('새로운 access_token과 refresh_token이 발급되었습니다.');

                            if (location != 'dashboard') {
                                window.location.href = 'dashboard.php';
                            }
                        } else {
                            console.log('리프레시 토큰도 만료됨: 다시 로그인 필요');
                            // 둘 다 만료된 경우 로그인 페이지로 리디렉션

                            if (location != 'page_login') {
                                window.location.href = 'page_login.php';
                            }
                            
                        }
                    });
                }
            });
    } else {
        console.log('토큰 없음: 로그인 페이지로 이동');
        if (location != 'page_login') {
            window.location.href = 'page_login.php'; // 토큰이 없으면 로그인 페이지로 이동
        }
    }
}




// logout
function logout(location='') {
    // 토큰 유효성 확인 절차
    let accessToken = localStorage.getItem('access_token');
    let refreshToken = localStorage.getItem('refresh_token');

    if (accessToken && refreshToken) {
        // access_token을 서버에 보내 유효성 확인
        fetch('/home/logout.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
               },
            body: JSON.stringify({
                refresh_token: refreshToken
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                console.log(data.message);

                // localStorage에서 토큰 삭제
                localStorage.removeItem('access_token');
                localStorage.removeItem('refresh_token');

                
                // 토큰이 유효하면 로그인페이지에서는 데시보드로 이동
                if (location != 'page_login') {
                    window.location.href = 'page_login.php';
                }
            } else {
                console.log('로그아웃 실패');
            }
        });
    } else {
        console.log('토큰 없음: 로그인 페이지로 이동');
        if (location != 'page_login') {
            window.location.href = 'page_login.php'; // 토큰이 없으면 로그인 페이지로 이동
        }
    }
}