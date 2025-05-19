import requests
from bs4 import BeautifulSoup

# 1. 요청할 URL 설정
url = 'https://www.coupang.com/vp/products/7542645597?itemId=23089720170&vendorItemId=90123166466&sourceType=srp_product_ads&clickEventId=959c68a0-d6f2-11ef-a2ed-b7fd111b71f2&korePlacement=15&koreSubPlacement=1&q=%EC%9C%84%EC%83%9D%EB%B3%B5+5xl&itemsCount=36&searchId=821b69586430279&rank=0&searchRank=0&isAddedCart='

# 2. HTTP GET 요청
response = requests.get(url)

# 3. 응답 HTML 저장
html_content = response.text

# 4. HTML 파일로 저장
with open('output.html', 'w', encoding='utf-8') as file:
    file.write(html_content)

print("HTML 파일 저장 완료: output.html")