<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>smallbee_data</title>
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/todo_maps/assets/img/fontello-6c2d3883/css/fontello-embedded.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/todo_maps/assets/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/todo_maps/assets/css/common.css">
    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=mu8wv2w2f9"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://poleji.cafe24.com/home/todo_maps/assets/js/script.js"></script>
    <style type="text/css">
        .wrap{
            padding: 15px;
        }
        
    </style>
<?php
// Connection parameters
$servername = "uws7-143.cafe24.com";
$username = "poleji";
$password = "vhvhfdyd>98";
$dbname = "poleji";

// Provided JSON data
$jsonData = '{
    "retCode": 0,
    "retMsg": "OK",
    "data": {
        "totalCount": 181,
        "limit": 500,
        "offset": 0,
        "payDetails": [
            
            {
                "payId": 3236756,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3488257,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 15000,
                "payDate": "2023-01-04 12:35:05",
                "createDate": 1672803306103,
                "modifyDate": 1672803306103,
                "version": 0,
                "createdAt": "2023-01-04 12:35:06",
                "modifiedAt": "2023-01-04 12:35:06"
            },
            {
                "payId": 3236764,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3488257,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -15000,
                "payDate": "2023-01-04 12:35:22",
                "createDate": 1672803323607,
                "modifyDate": 1672803323607,
                "version": 0,
                "createdAt": "2023-01-04 12:35:23",
                "modifiedAt": "2023-01-04 12:35:23"
            },
            {
                "payId": 3236788,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3488410,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 15000,
                "payDate": "2023-01-04 12:36:47",
                "createDate": 1672803407533,
                "modifyDate": 1672803407533,
                "version": 0,
                "createdAt": "2023-01-04 12:36:47",
                "modifiedAt": "2023-01-04 12:36:47"
            },
            {
                "payId": 3236793,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3488410,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -15000,
                "payDate": "2023-01-04 12:36:59",
                "createDate": 1672803419621,
                "modifyDate": 1672803419621,
                "version": 0,
                "createdAt": "2023-01-04 12:36:59",
                "modifiedAt": "2023-01-04 12:36:59"
            },
            {
                "payId": 3242529,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3494518,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-01-05 10:39:05",
                "createDate": 1672882745480,
                "modifyDate": 1672882745480,
                "version": 0,
                "createdAt": "2023-01-05 10:39:05",
                "modifiedAt": "2023-01-05 10:39:05"
            },
            {
                "payId": 3242537,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3494518,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -16000,
                "payDate": "2023-01-05 10:39:24",
                "createDate": 1672882764771,
                "modifyDate": 1672882764771,
                "version": 0,
                "createdAt": "2023-01-05 10:39:24",
                "modifiedAt": "2023-01-05 10:39:24"
            },
            {
                "payId": 3243774,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3495916,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 25000,
                "payDate": "2023-01-05 12:10:45",
                "createDate": 1672888246014,
                "modifyDate": 1672888246014,
                "version": 0,
                "createdAt": "2023-01-05 12:10:46",
                "modifiedAt": "2023-01-05 12:10:46"
            },
            {
                "payId": 3243790,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3495916,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -25000,
                "payDate": "2023-01-05 12:11:12",
                "createDate": 1672888272693,
                "modifyDate": 1672888272693,
                "version": 0,
                "createdAt": "2023-01-05 12:11:12",
                "modifiedAt": "2023-01-05 12:11:12"
            },
            {
                "payId": 3275315,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3506324,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 15000,
                "payDate": "2023-01-10 12:56:04",
                "createDate": 1673322964818,
                "modifyDate": 1673322964818,
                "version": 0,
                "createdAt": "2023-01-10 12:56:04",
                "modifiedAt": "2023-01-10 12:56:04"
            },
            {
                "payId": 3275319,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3506324,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -15000,
                "payDate": "2023-01-10 12:56:24",
                "createDate": 1673322984757,
                "modifyDate": 1673322984757,
                "version": 0,
                "createdAt": "2023-01-10 12:56:24",
                "modifiedAt": "2023-01-10 12:56:24"
            },
            {
                "payId": 3275673,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3532306,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-01-10 13:16:29",
                "createDate": 1673324190287,
                "modifyDate": 1673324190287,
                "version": 0,
                "createdAt": "2023-01-10 13:16:30",
                "modifiedAt": "2023-01-10 13:16:30"
            },
            {
                "payId": 3275680,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3532306,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -16000,
                "payDate": "2023-01-10 13:16:51",
                "createDate": 1673324212061,
                "modifyDate": 1673324212061,
                "version": 0,
                "createdAt": "2023-01-10 13:16:52",
                "modifiedAt": "2023-01-10 13:16:52"
            },
            {
                "payId": 3278389,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3532324,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-01-10 19:16:00",
                "createDate": 1673345760645,
                "modifyDate": 1673345760645,
                "version": 0,
                "createdAt": "2023-01-10 19:16:00",
                "modifiedAt": "2023-01-10 19:16:00"
            },
            {
                "payId": 3278391,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3532324,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -16000,
                "payDate": "2023-01-10 19:16:21",
                "createDate": 1673345782170,
                "modifyDate": 1673345782170,
                "version": 0,
                "createdAt": "2023-01-10 19:16:22",
                "modifiedAt": "2023-01-10 19:16:22"
            },
            {
                "payId": 3285114,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3542223,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 25000,
                "payDate": "2023-01-11 17:05:24",
                "createDate": 1673424325360,
                "modifyDate": 1673424325360,
                "version": 0,
                "createdAt": "2023-01-11 17:05:25",
                "modifiedAt": "2023-01-11 17:05:25"
            },
            {
                "payId": 3285118,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3542223,
                "requestType": "매장",
                "payVendor": "smartrovcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -25000,
                "payDate": "2023-01-11 17:05:46",
                "createDate": 1673424347083,
                "modifyDate": 1673424347083,
                "version": 0,
                "createdAt": "2023-01-11 17:05:47",
                "modifiedAt": "2023-01-11 17:05:47"
            },
            {
                "payId": 3318861,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3577639,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 1000,
                "payDate": "2023-01-17 11:02:00",
                "createDate": 1673920921241,
                "modifyDate": 1673920921241,
                "version": 0,
                "createdAt": "2023-01-17 11:02:01",
                "modifiedAt": "2023-01-17 11:02:01"
            },
            {
                "payId": 3340686,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3603929,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 22000,
                "payDate": "2023-01-20 10:25:16",
                "createDate": 1674177915771,
                "modifyDate": 1674177915771,
                "version": 0,
                "createdAt": "2023-01-20 10:25:15",
                "modifiedAt": "2023-01-20 10:25:15"
            },
            {
                "payId": 3340691,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3603937,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-01-20 10:25:45",
                "createDate": 1674177944618,
                "modifyDate": 1674177944618,
                "version": 0,
                "createdAt": "2023-01-20 10:25:44",
                "modifiedAt": "2023-01-20 10:25:44"
            },
            {
                "payId": 3341946,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3576098,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 15000,
                "payDate": "2023-01-20 12:09:33",
                "createDate": 1674184173165,
                "modifyDate": 1674184173165,
                "version": 0,
                "createdAt": "2023-01-20 12:09:33",
                "modifiedAt": "2023-01-20 12:09:33"
            },
            {
                "payId": 3341978,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3605331,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-01-20 12:11:50",
                "createDate": 1674184309471,
                "modifyDate": 1674184309471,
                "version": 0,
                "createdAt": "2023-01-20 12:11:49",
                "modifiedAt": "2023-01-20 12:11:49"
            },
            {
                "payId": 3341981,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3605328,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-01-20 12:12:00",
                "createDate": 1674184319529,
                "modifyDate": 1674184319529,
                "version": 0,
                "createdAt": "2023-01-20 12:11:59",
                "modifiedAt": "2023-01-20 12:11:59"
            },
            {
                "payId": 3400636,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3605331,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -18000,
                "payDate": "2023-01-31 12:01:38",
                "createDate": 1675134098197,
                "modifyDate": 1675134098197,
                "version": 0,
                "createdAt": "2023-01-31 12:01:38",
                "modifiedAt": "2023-01-31 12:01:38"
            },
            {
                "payId": 3400639,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3605328,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -18000,
                "payDate": "2023-01-31 12:01:42",
                "createDate": 1675134102338,
                "modifyDate": 1675134102338,
                "version": 0,
                "createdAt": "2023-01-31 12:01:42",
                "modifiedAt": "2023-01-31 12:01:42"
            },
            {
                "payId": 3400640,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3603937,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -18000,
                "payDate": "2023-01-31 12:01:47",
                "createDate": 1675134106635,
                "modifyDate": 1675134106635,
                "version": 0,
                "createdAt": "2023-01-31 12:01:46",
                "modifiedAt": "2023-01-31 12:01:46"
            },
            {
                "payId": 3400642,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3603929,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -22000,
                "payDate": "2023-01-31 12:01:50",
                "createDate": 1675134110522,
                "modifyDate": 1675134110522,
                "version": 0,
                "createdAt": "2023-01-31 12:01:50",
                "modifiedAt": "2023-01-31 12:01:50"
            },
            {
                "payId": 3400644,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3577639,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -1000,
                "payDate": "2023-01-31 12:01:57",
                "createDate": 1675134116745,
                "modifyDate": 1675134116745,
                "version": 0,
                "createdAt": "2023-01-31 12:01:56",
                "modifiedAt": "2023-01-31 12:01:56"
            },
            {
                "payId": 3400646,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3576098,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -15000,
                "payDate": "2023-01-31 12:02:03",
                "createDate": 1675134122696,
                "modifyDate": 1675134122696,
                "version": 0,
                "createdAt": "2023-01-31 12:02:02",
                "modifiedAt": "2023-01-31 12:02:02"
            },
            {
                "payId": 3557964,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3843831,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-02-23 11:22:26",
                "createDate": 1677118946874,
                "modifyDate": 1677118946874,
                "version": 0,
                "createdAt": "2023-02-23 11:22:26",
                "modifiedAt": "2023-02-23 11:22:26"
            },
            {
                "payId": 3611723,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3903543,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "외상",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 5000,
                "payDate": "2023-03-02 21:51:32",
                "createDate": 1677761492888,
                "modifyDate": 1677761492888,
                "version": 0,
                "createdAt": "2023-03-02 21:51:32",
                "modifiedAt": "2023-03-02 21:51:32"
            },
            {
                "payId": 3611726,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3903546,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "외상",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -5000,
                "payDate": "2023-03-02 22:08:13",
                "createDate": 1677762492974,
                "modifyDate": 1677762492974,
                "version": 0,
                "createdAt": "2023-03-02 22:08:12",
                "modifiedAt": "2023-03-02 22:08:12"
            },
            {
                "payId": 3650082,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3945055,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "외상",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 7000,
                "payDate": "2023-03-08 14:30:06",
                "createDate": 1678253406225,
                "modifyDate": 1678253406225,
                "version": 0,
                "createdAt": "2023-03-08 14:30:06",
                "modifiedAt": "2023-03-08 14:30:06"
            },
            {
                "payId": 3650086,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 3945055,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "외상",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -7000,
                "payDate": "2023-03-08 14:30:31",
                "createDate": 1678253431492,
                "modifyDate": 1678253431492,
                "version": 0,
                "createdAt": "2023-03-08 14:30:31",
                "modifiedAt": "2023-03-08 14:30:31"
            },
            {
                "payId": 3839646,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4150520,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-04-04 14:12:24",
                "createDate": 1680585144959,
                "modifyDate": 1680585144959,
                "version": 0,
                "createdAt": "2023-04-04 14:12:24",
                "modifiedAt": "2023-04-04 14:12:24"
            },
            {
                "payId": 3839652,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4150524,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-04-04 14:12:50",
                "createDate": 1680585170817,
                "modifyDate": 1680585170817,
                "version": 0,
                "createdAt": "2023-04-04 14:12:50",
                "modifiedAt": "2023-04-04 14:12:50"
            },
            {
                "payId": 3839656,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4150529,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-04-04 14:13:13",
                "createDate": 1680585193398,
                "modifyDate": 1680585193398,
                "version": 0,
                "createdAt": "2023-04-04 14:13:13",
                "modifiedAt": "2023-04-04 14:13:13"
            },
            {
                "payId": 3839659,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4150532,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-04-04 14:13:24",
                "createDate": 1680585204536,
                "modifyDate": 1680585204536,
                "version": 0,
                "createdAt": "2023-04-04 14:13:24",
                "modifiedAt": "2023-04-04 14:13:24"
            },
            {
                "payId": 3839660,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4150532,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-04-04 14:13:27",
                "createDate": 1680585207758,
                "modifyDate": 1680585207758,
                "version": 0,
                "createdAt": "2023-04-04 14:13:27",
                "modifiedAt": "2023-04-04 14:13:27"
            },
            {
                "payId": 3998763,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4323264,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 84000,
                "payDate": "2023-04-26 11:50:35",
                "createDate": 1682477436381,
                "modifyDate": 1682477436381,
                "version": 0,
                "createdAt": "2023-04-26 11:50:36",
                "modifiedAt": "2023-04-26 11:50:36"
            },
            {
                "payId": 3998780,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4323244,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 94000,
                "payDate": "2023-04-26 11:51:15",
                "createDate": 1682477476439,
                "modifyDate": 1682477476439,
                "version": 0,
                "createdAt": "2023-04-26 11:51:16",
                "modifiedAt": "2023-04-26 11:51:16"
            },
            {
                "payId": 3999112,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4323686,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-04-26 12:06:32",
                "createDate": 1682478393523,
                "modifyDate": 1682478393523,
                "version": 0,
                "createdAt": "2023-04-26 12:06:33",
                "modifiedAt": "2023-04-26 12:06:33"
            },
            {
                "payId": 3999115,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4323692,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 20000,
                "payDate": "2023-04-26 12:06:44",
                "createDate": 1682478405424,
                "modifyDate": 1682478405424,
                "version": 0,
                "createdAt": "2023-04-26 12:06:45",
                "modifiedAt": "2023-04-26 12:06:45"
            },
            {
                "payId": 3999119,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4323692,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -20000,
                "payDate": "2023-04-26 12:06:56",
                "createDate": 1682478417782,
                "modifyDate": 1682478417782,
                "version": 0,
                "createdAt": "2023-04-26 12:06:57",
                "modifiedAt": "2023-04-26 12:06:57"
            },
            {
                "payId": 3999134,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4323710,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 20000,
                "payDate": "2023-04-26 12:07:38",
                "createDate": 1682478459314,
                "modifyDate": 1682478459314,
                "version": 0,
                "createdAt": "2023-04-26 12:07:39",
                "modifiedAt": "2023-04-26 12:07:39"
            },
            {
                "payId": 3999141,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4323710,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -20000,
                "payDate": "2023-04-26 12:07:52",
                "createDate": 1682478472924,
                "modifyDate": 1682478472924,
                "version": 0,
                "createdAt": "2023-04-26 12:07:52",
                "modifiedAt": "2023-04-26 12:07:52"
            },
            {
                "payId": 3999156,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4323731,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 22000,
                "payDate": "2023-04-26 12:08:42",
                "createDate": 1682478522878,
                "modifyDate": 1682478522878,
                "version": 0,
                "createdAt": "2023-04-26 12:08:42",
                "modifiedAt": "2023-04-26 12:08:42"
            },
            {
                "payId": 3999167,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4323731,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -22000,
                "payDate": "2023-04-26 12:09:01",
                "createDate": 1682478542196,
                "modifyDate": 1682478542196,
                "version": 0,
                "createdAt": "2023-04-26 12:09:02",
                "modifiedAt": "2023-04-26 12:09:02"
            },
            {
                "payId": 3999765,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4324348,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-04-26 12:34:04",
                "createDate": 1682480044979,
                "modifyDate": 1682480044979,
                "version": 0,
                "createdAt": "2023-04-26 12:34:04",
                "modifiedAt": "2023-04-26 12:34:04"
            },
            {
                "payId": 4010007,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4335041,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-04-27 14:55:10",
                "createDate": 1682574910025,
                "modifyDate": 1682574910025,
                "version": 0,
                "createdAt": "2023-04-27 14:55:10",
                "modifiedAt": "2023-04-27 14:55:10"
            },
            {
                "payId": 4010413,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4335383,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 1000,
                "payDate": "2023-04-27 15:40:28",
                "createDate": 1682577628099,
                "modifyDate": 1682577628099,
                "version": 0,
                "createdAt": "2023-04-27 15:40:28",
                "modifiedAt": "2023-04-27 15:40:28"
            },
            {
                "payId": 4011180,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4336356,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-04-27 17:45:19",
                "createDate": 1682585119420,
                "modifyDate": 1682585119420,
                "version": 0,
                "createdAt": "2023-04-27 17:45:19",
                "modifiedAt": "2023-04-27 17:45:19"
            },
            {
                "payId": 4011184,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4336361,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-04-27 17:45:56",
                "createDate": 1682585155982,
                "modifyDate": 1682585155982,
                "version": 0,
                "createdAt": "2023-04-27 17:45:55",
                "modifiedAt": "2023-04-27 17:45:55"
            },
            {
                "payId": 4187677,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4532235,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 610000,
                "payDate": "2023-05-22 11:15:58",
                "createDate": 1684721759092,
                "modifyDate": 1684721759092,
                "version": 0,
                "createdAt": "2023-05-22 11:15:59",
                "modifiedAt": "2023-05-22 11:15:59"
            },
            {
                "payId": 4191141,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4532185,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 48000,
                "payDate": "2023-05-22 14:23:33",
                "createDate": 1684733016962,
                "modifyDate": 1684733016962,
                "version": 0,
                "createdAt": "2023-05-22 14:23:36",
                "modifiedAt": "2023-05-22 14:23:36"
            },
            {
                "payId": 4192312,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4537101,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-05-22 16:53:00",
                "createDate": 1684741979671,
                "modifyDate": 1684741979671,
                "version": 0,
                "createdAt": "2023-05-22 16:52:59",
                "modifiedAt": "2023-05-22 16:52:59"
            },
            {
                "payId": 4192324,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4537094,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 19000,
                "payDate": "2023-05-22 16:55:27",
                "createDate": 1684742126503,
                "modifyDate": 1684742126503,
                "version": 0,
                "createdAt": "2023-05-22 16:55:26",
                "modifiedAt": "2023-05-22 16:55:26"
            },
            {
                "payId": 4192362,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4537090,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 48000,
                "payDate": "2023-05-22 17:03:05",
                "createDate": 1684742584679,
                "modifyDate": 1684742584679,
                "version": 0,
                "createdAt": "2023-05-22 17:03:04",
                "modifiedAt": "2023-05-22 17:03:04"
            },
            {
                "payId": 4192461,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4537232,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 6000,
                "payDate": "2023-05-22 17:19:57",
                "createDate": 1684743596996,
                "modifyDate": 1684743596996,
                "version": 0,
                "createdAt": "2023-05-22 17:19:56",
                "modifiedAt": "2023-05-22 17:19:56"
            },
            {
                "payId": 4314502,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4673642,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 9000,
                "payDate": "2023-06-08 10:25:58",
                "createDate": 1686187558478,
                "modifyDate": 1686187558478,
                "version": 0,
                "createdAt": "2023-06-08 10:25:58",
                "modifiedAt": "2023-06-08 10:25:58"
            },
            {
                "payId": 4314513,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4673650,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 9000,
                "payDate": "2023-06-08 10:27:03",
                "createDate": 1686187623956,
                "modifyDate": 1686187623956,
                "version": 0,
                "createdAt": "2023-06-08 10:27:03",
                "modifiedAt": "2023-06-08 10:27:03"
            },
            {
                "payId": 4314610,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4673753,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 6500,
                "payDate": "2023-06-08 10:35:08",
                "createDate": 1686188109070,
                "modifyDate": 1686188109070,
                "version": 0,
                "createdAt": "2023-06-08 10:35:09",
                "modifiedAt": "2023-06-08 10:35:09"
            },
            {
                "payId": 4314729,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4673642,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -9000,
                "payDate": "2023-06-08 10:46:24",
                "createDate": 1686188785113,
                "modifyDate": 1686188785113,
                "version": 0,
                "createdAt": "2023-06-08 10:46:25",
                "modifiedAt": "2023-06-08 10:46:25"
            },
            {
                "payId": 4319637,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4678543,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 45500,
                "payDate": "2023-06-08 17:17:53",
                "createDate": 1686212275411,
                "modifyDate": 1686212275411,
                "version": 0,
                "createdAt": "2023-06-08 17:17:55",
                "modifiedAt": "2023-06-08 17:17:55"
            },
            {
                "payId": 4322414,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4682163,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 21000,
                "payDate": "2023-06-09 09:48:27",
                "createDate": 1686271709110,
                "modifyDate": 1686271709110,
                "version": 0,
                "createdAt": "2023-06-09 09:48:29",
                "modifiedAt": "2023-06-09 09:48:29"
            },
            {
                "payId": 4376667,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4741789,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 454000,
                "payDate": "2023-06-16 10:12:25",
                "createDate": 1686877946727,
                "modifyDate": 1686877946727,
                "version": 0,
                "createdAt": "2023-06-16 10:12:26",
                "modifiedAt": "2023-06-16 10:12:26"
            },
            {
                "payId": 4376718,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4741864,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 950000,
                "payDate": "2023-06-16 10:16:23",
                "createDate": 1686878184559,
                "modifyDate": 1686878184559,
                "version": 0,
                "createdAt": "2023-06-16 10:16:24",
                "modifiedAt": "2023-06-16 10:16:24"
            },
            {
                "payId": 4396583,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4764871,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 19000,
                "payDate": "2023-06-19 11:10:52",
                "createDate": 1687140604929,
                "modifyDate": 1687140604929,
                "version": 0,
                "createdAt": "2023-06-19 11:10:04",
                "modifiedAt": "2023-06-19 11:10:04"
            },
            {
                "payId": 4396644,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4764931,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 33000,
                "payDate": "2023-06-19 11:16:20",
                "createDate": 1687140933356,
                "modifyDate": 1687140933356,
                "version": 0,
                "createdAt": "2023-06-19 11:15:33",
                "modifiedAt": "2023-06-19 11:15:33"
            },
            {
                "payId": 4396648,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4764851,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 39000,
                "payDate": "2023-06-19 11:16:31",
                "createDate": 1687140943928,
                "modifyDate": 1687140943928,
                "version": 0,
                "createdAt": "2023-06-19 11:15:43",
                "modifiedAt": "2023-06-19 11:15:43"
            },
            {
                "payId": 4396720,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4765008,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 62000,
                "payDate": "2023-06-19 11:21:37",
                "createDate": 1687141249996,
                "modifyDate": 1687141249996,
                "version": 0,
                "createdAt": "2023-06-19 11:20:49",
                "modifiedAt": "2023-06-19 11:20:49"
            },
            {
                "payId": 4396759,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4765088,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 25500,
                "payDate": "2023-06-19 11:24:33",
                "createDate": 1687141425796,
                "modifyDate": 1687141425796,
                "version": 0,
                "createdAt": "2023-06-19 11:23:45",
                "modifiedAt": "2023-06-19 11:23:45"
            },
            {
                "payId": 4396796,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4765132,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 352000,
                "payDate": "2023-06-19 11:26:51",
                "createDate": 1687141564236,
                "modifyDate": 1687141564236,
                "version": 0,
                "createdAt": "2023-06-19 11:26:04",
                "modifiedAt": "2023-06-19 11:26:04"
            },
            {
                "payId": 4397102,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4765169,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 38000,
                "payDate": "2023-06-19 11:44:09",
                "createDate": 1687142649707,
                "modifyDate": 1687142649707,
                "version": 0,
                "createdAt": "2023-06-19 11:44:09",
                "modifiedAt": "2023-06-19 11:44:09"
            },
            {
                "payId": 4397200,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4765009,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 6000,
                "payDate": "2023-06-19 11:48:41",
                "createDate": 1687142921278,
                "modifyDate": 1687142921278,
                "version": 0,
                "createdAt": "2023-06-19 11:48:41",
                "modifiedAt": "2023-06-19 11:48:41"
            },
            {
                "payId": 4397217,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4765521,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 24000,
                "payDate": "2023-06-19 11:49:32",
                "createDate": 1687142972624,
                "modifyDate": 1687142972624,
                "version": 0,
                "createdAt": "2023-06-19 11:49:32",
                "modifiedAt": "2023-06-19 11:49:32"
            },
            {
                "payId": 4409702,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4765633,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-06-20 16:07:46",
                "createDate": 1687244867436,
                "modifyDate": 1687244867436,
                "version": 0,
                "createdAt": "2023-06-20 16:07:47",
                "modifiedAt": "2023-06-20 16:07:47"
            },
            {
                "payId": 4409707,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4774174,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 47000,
                "payDate": "2023-06-20 16:08:04",
                "createDate": 1687244884594,
                "modifyDate": 1687244884594,
                "version": 0,
                "createdAt": "2023-06-20 16:08:04",
                "modifiedAt": "2023-06-20 16:08:04"
            },
            {
                "payId": 4457996,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4799804,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 60000,
                "payDate": "2023-06-27 09:43:54",
                "createDate": 1687826625415,
                "modifyDate": 1687826625415,
                "version": 0,
                "createdAt": "2023-06-27 09:43:45",
                "modifiedAt": "2023-06-27 09:43:45"
            },
            {
                "payId": 4458000,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4795649,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 30000,
                "payDate": "2023-06-27 09:44:03",
                "createDate": 1687826634030,
                "modifyDate": 1687826634030,
                "version": 0,
                "createdAt": "2023-06-27 09:43:54",
                "modifiedAt": "2023-06-27 09:43:54"
            },
            {
                "payId": 4727806,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4832191,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 84000,
                "payDate": "2023-07-31 16:02:31",
                "createDate": 1690786950399,
                "modifyDate": 1690786950399,
                "version": 0,
                "createdAt": "2023-07-31 16:02:30",
                "modifiedAt": "2023-07-31 16:02:30"
            },
            {
                "payId": 4727808,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 4832183,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 318500,
                "payDate": "2023-07-31 16:02:41",
                "createDate": 1690786960177,
                "modifyDate": 1690786960177,
                "version": 0,
                "createdAt": "2023-07-31 16:02:40",
                "modifiedAt": "2023-07-31 16:02:40"
            },
            {
                "payId": 4728253,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5135423,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-07-31 17:00:00",
                "createDate": 1690790401139,
                "modifyDate": 1690790401139,
                "version": 0,
                "createdAt": "2023-07-31 17:00:01",
                "modifiedAt": "2023-07-31 17:00:01"
            },
            {
                "payId": 4940141,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5346577,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 17000,
                "payDate": "2023-08-28 11:04:02",
                "createDate": 1693188243377,
                "modifyDate": 1693188243377,
                "version": 0,
                "createdAt": "2023-08-28 11:04:03",
                "modifiedAt": "2023-08-28 11:04:03"
            },
            {
                "payId": 5001650,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5440430,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 52000,
                "payDate": "2023-09-05 10:35:09",
                "createDate": 1693877709850,
                "modifyDate": 1693877709850,
                "version": 0,
                "createdAt": "2023-09-05 10:35:09",
                "modifiedAt": "2023-09-05 10:35:09"
            },
            {
                "payId": 5138945,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5374040,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 6000,
                "payDate": "2023-09-22 14:31:12",
                "createDate": 1695360672325,
                "modifyDate": 1695360672325,
                "version": 0,
                "createdAt": "2023-09-22 14:31:12",
                "modifiedAt": "2023-09-22 14:31:12"
            },
            {
                "payId": 5222086,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5682532,
                "requestType": "사용자",
                "payVendor": "kovanpg",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "배달",
                "isReceiptIssued": null,
                "amount": 21000,
                "payDate": "2023-10-06 10:08:16",
                "createDate": 1696554543642,
                "modifyDate": 1696554543642,
                "version": 0,
                "createdAt": "2023-10-06 10:09:03",
                "modifiedAt": "2023-10-06 10:09:03"
            },
            {
                "payId": 5222232,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5682532,
                "requestType": "매장",
                "payVendor": "kovanpg",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "배달",
                "isReceiptIssued": 0,
                "amount": -21000,
                "payDate": "2023-10-06 10:22:23",
                "createDate": 1696555344542,
                "modifyDate": 1696555344542,
                "version": 0,
                "createdAt": "2023-10-06 10:22:24",
                "modifiedAt": "2023-10-06 10:22:24"
            },
            {
                "payId": 5222374,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5682828,
                "requestType": "사용자",
                "payVendor": "kovanpg",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "배달",
                "isReceiptIssued": null,
                "amount": 24000,
                "payDate": "2023-10-06 10:32:13",
                "createDate": 1696555966793,
                "modifyDate": 1696555966793,
                "version": 0,
                "createdAt": "2023-10-06 10:32:46",
                "modifiedAt": "2023-10-06 10:32:46"
            },
            {
                "payId": 5222434,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5682828,
                "requestType": "매장",
                "payVendor": "kovanpg",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "배달",
                "isReceiptIssued": 0,
                "amount": -24000,
                "payDate": "2023-10-06 10:37:43",
                "createDate": 1696556264010,
                "modifyDate": 1696556264010,
                "version": 0,
                "createdAt": "2023-10-06 10:37:44",
                "modifiedAt": "2023-10-06 10:37:44"
            },
            {
                "payId": 5222450,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5682908,
                "requestType": "사용자",
                "payVendor": "kovanpg",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "배달",
                "isReceiptIssued": null,
                "amount": 21000,
                "payDate": "2023-10-06 10:38:39",
                "createDate": 1696556347616,
                "modifyDate": 1696556347616,
                "version": 0,
                "createdAt": "2023-10-06 10:39:07",
                "modifiedAt": "2023-10-06 10:39:07"
            },
            {
                "payId": 5222530,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5682908,
                "requestType": "매장",
                "payVendor": "kovanpg",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "배달",
                "isReceiptIssued": 0,
                "amount": -21000,
                "payDate": "2023-10-06 10:45:41",
                "createDate": 1696556742153,
                "modifyDate": 1696556742153,
                "version": 0,
                "createdAt": "2023-10-06 10:45:42",
                "modifiedAt": "2023-10-06 10:45:42"
            },
            {
                "payId": 5226335,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5686951,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-06 14:42:04",
                "createDate": 1696570926769,
                "modifyDate": 1696570926769,
                "version": 0,
                "createdAt": "2023-10-06 14:42:06",
                "modifiedAt": "2023-10-06 14:42:06"
            },
            {
                "payId": 5226346,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5686951,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -8000,
                "payDate": "2023-10-06 14:43:17",
                "createDate": 1696570999850,
                "modifyDate": 1696570999850,
                "version": 0,
                "createdAt": "2023-10-06 14:43:19",
                "modifiedAt": "2023-10-06 14:43:19"
            },
            {
                "payId": 5226442,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687055,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 12500,
                "payDate": "2023-10-06 14:55:32",
                "createDate": 1696571735577,
                "modifyDate": 1696571735577,
                "version": 0,
                "createdAt": "2023-10-06 14:55:35",
                "modifiedAt": "2023-10-06 14:55:35"
            },
            {
                "payId": 5226453,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687055,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -12500,
                "payDate": "2023-10-06 14:56:27",
                "createDate": 1696571790185,
                "modifyDate": 1696571790185,
                "version": 0,
                "createdAt": "2023-10-06 14:56:30",
                "modifiedAt": "2023-10-06 14:56:30"
            },
            {
                "payId": 5226482,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687095,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 1,
                "amount": 6000,
                "payDate": "2023-10-06 14:59:35",
                "createDate": 1696571978062,
                "modifyDate": 1696571978062,
                "version": 0,
                "createdAt": "2023-10-06 14:59:38",
                "modifiedAt": "2023-10-06 14:59:38"
            },
            {
                "payId": 5226488,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687095,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 1,
                "amount": -6000,
                "payDate": "2023-10-06 15:00:20",
                "createDate": 1696572023046,
                "modifyDate": 1696572023046,
                "version": 0,
                "createdAt": "2023-10-06 15:00:23",
                "modifiedAt": "2023-10-06 15:00:23"
            },
            {
                "payId": 5226496,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687116,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "외상",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 10000,
                "payDate": "2023-10-06 15:01:07",
                "createDate": 1696572067229,
                "modifyDate": 1696572067229,
                "version": 0,
                "createdAt": "2023-10-06 15:01:07",
                "modifiedAt": "2023-10-06 15:01:07"
            },
            {
                "payId": 5226500,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687116,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "외상",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -10000,
                "payDate": "2023-10-06 15:01:36",
                "createDate": 1696572096713,
                "modifyDate": 1696572096713,
                "version": 0,
                "createdAt": "2023-10-06 15:01:36",
                "modifiedAt": "2023-10-06 15:01:36"
            },
            {
                "payId": 5226527,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687146,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-10-06 15:05:14",
                "createDate": 1696572315668,
                "modifyDate": 1696572315668,
                "version": 0,
                "createdAt": "2023-10-06 15:05:15",
                "modifiedAt": "2023-10-06 15:05:15"
            },
            {
                "payId": 5226537,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687146,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -18000,
                "payDate": "2023-10-06 15:06:22",
                "createDate": 1696572383814,
                "modifyDate": 1696572383814,
                "version": 0,
                "createdAt": "2023-10-06 15:06:23",
                "modifiedAt": "2023-10-06 15:06:23"
            },
            {
                "payId": 5226539,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687158,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-06 15:07:13",
                "createDate": 1696572434532,
                "modifyDate": 1696572434532,
                "version": 0,
                "createdAt": "2023-10-06 15:07:14",
                "modifiedAt": "2023-10-06 15:07:14"
            },
            {
                "payId": 5226551,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687158,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -8000,
                "payDate": "2023-10-06 15:08:25",
                "createDate": 1696572506892,
                "modifyDate": 1696572506892,
                "version": 0,
                "createdAt": "2023-10-06 15:08:26",
                "modifiedAt": "2023-10-06 15:08:26"
            },
            {
                "payId": 5226562,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687179,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 15000,
                "payDate": "2023-10-06 15:09:55",
                "createDate": 1696572598164,
                "modifyDate": 1696572598164,
                "version": 0,
                "createdAt": "2023-10-06 15:09:58",
                "modifiedAt": "2023-10-06 15:09:58"
            },
            {
                "payId": 5226564,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687179,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -15000,
                "payDate": "2023-10-06 15:10:18",
                "createDate": 1696572620869,
                "modifyDate": 1696572620869,
                "version": 0,
                "createdAt": "2023-10-06 15:10:20",
                "modifiedAt": "2023-10-06 15:10:20"
            },
            {
                "payId": 5226570,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687192,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 1,
                "amount": 7500,
                "payDate": "2023-10-06 15:11:01",
                "createDate": 1696572663794,
                "modifyDate": 1696572663794,
                "version": 0,
                "createdAt": "2023-10-06 15:11:03",
                "modifiedAt": "2023-10-06 15:11:03"
            },
            {
                "payId": 5226571,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687192,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 1,
                "amount": -7500,
                "payDate": "2023-10-06 15:11:19",
                "createDate": 1696572681320,
                "modifyDate": 1696572681320,
                "version": 0,
                "createdAt": "2023-10-06 15:11:21",
                "modifiedAt": "2023-10-06 15:11:21"
            },
            {
                "payId": 5226581,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687198,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 15000,
                "payDate": "2023-10-06 15:12:20",
                "createDate": 1696572741177,
                "modifyDate": 1696572741177,
                "version": 0,
                "createdAt": "2023-10-06 15:12:21",
                "modifiedAt": "2023-10-06 15:12:21"
            },
            {
                "payId": 5226585,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687198,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -15000,
                "payDate": "2023-10-06 15:12:44",
                "createDate": 1696572764992,
                "modifyDate": 1696572764992,
                "version": 0,
                "createdAt": "2023-10-06 15:12:44",
                "modifiedAt": "2023-10-06 15:12:44"
            },
            {
                "payId": 5226590,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687209,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 1,
                "amount": 8000,
                "payDate": "2023-10-06 15:13:12",
                "createDate": 1696572793062,
                "modifyDate": 1696572793062,
                "version": 0,
                "createdAt": "2023-10-06 15:13:13",
                "modifiedAt": "2023-10-06 15:13:13"
            },
            {
                "payId": 5226593,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687209,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 1,
                "amount": -8000,
                "payDate": "2023-10-06 15:13:29",
                "createDate": 1696572809805,
                "modifyDate": 1696572809805,
                "version": 0,
                "createdAt": "2023-10-06 15:13:29",
                "modifiedAt": "2023-10-06 15:13:29"
            },
            {
                "payId": 5226600,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687214,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 56000,
                "payDate": "2023-10-06 15:14:29",
                "createDate": 1696572870069,
                "modifyDate": 1696572870069,
                "version": 0,
                "createdAt": "2023-10-06 15:14:30",
                "modifiedAt": "2023-10-06 15:14:30"
            },
            {
                "payId": 5226602,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687214,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -56000,
                "payDate": "2023-10-06 15:14:49",
                "createDate": 1696572889545,
                "modifyDate": 1696572889545,
                "version": 0,
                "createdAt": "2023-10-06 15:14:49",
                "modifiedAt": "2023-10-06 15:14:49"
            },
            {
                "payId": 5226612,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687223,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 55000,
                "payDate": "2023-10-06 15:15:36",
                "createDate": 1696572937654,
                "modifyDate": 1696572937654,
                "version": 0,
                "createdAt": "2023-10-06 15:15:37",
                "modifiedAt": "2023-10-06 15:15:37"
            },
            {
                "payId": 5226619,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687223,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -55000,
                "payDate": "2023-10-06 15:16:28",
                "createDate": 1696572989697,
                "modifyDate": 1696572989697,
                "version": 0,
                "createdAt": "2023-10-06 15:16:29",
                "modifiedAt": "2023-10-06 15:16:29"
            },
            {
                "payId": 5226658,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687274,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-10-06 15:22:47",
                "createDate": 1696573368558,
                "modifyDate": 1696573368558,
                "version": 0,
                "createdAt": "2023-10-06 15:22:48",
                "modifiedAt": "2023-10-06 15:22:48"
            },
            {
                "payId": 5226677,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687296,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -16000,
                "payDate": "2023-10-06 15:24:59",
                "createDate": 1696573500949,
                "modifyDate": 1696573500949,
                "version": 0,
                "createdAt": "2023-10-06 15:25:00",
                "modifiedAt": "2023-10-06 15:25:00"
            },
            {
                "payId": 5226682,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687298,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 1,
                "amount": 8000,
                "payDate": "2023-10-06 15:26:00",
                "createDate": 1696573561430,
                "modifyDate": 1696573561430,
                "version": 0,
                "createdAt": "2023-10-06 15:26:01",
                "modifiedAt": "2023-10-06 15:26:01"
            },
            {
                "payId": 5226688,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687298,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 1,
                "amount": -8000,
                "payDate": "2023-10-06 15:26:23",
                "createDate": 1696573584595,
                "modifyDate": 1696573584595,
                "version": 0,
                "createdAt": "2023-10-06 15:26:24",
                "modifiedAt": "2023-10-06 15:26:24"
            },
            {
                "payId": 5227059,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687698,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "포장",
                "isReceiptIssued": 0,
                "amount": 10000,
                "payDate": "2023-10-06 16:17:56",
                "createDate": 1696576678145,
                "modifyDate": 1696576678145,
                "version": 0,
                "createdAt": "2023-10-06 16:17:58",
                "modifiedAt": "2023-10-06 16:17:58"
            },
            {
                "payId": 5227088,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687718,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 6000,
                "payDate": "2023-10-06 16:23:17",
                "createDate": 1696577000739,
                "modifyDate": 1696577000739,
                "version": 0,
                "createdAt": "2023-10-06 16:23:20",
                "modifiedAt": "2023-10-06 16:23:20"
            },
            {
                "payId": 5227094,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687728,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 21000,
                "payDate": "2023-10-06 16:24:02",
                "createDate": 1696577044004,
                "modifyDate": 1696577044004,
                "version": 0,
                "createdAt": "2023-10-06 16:24:04",
                "modifiedAt": "2023-10-06 16:24:04"
            },
            {
                "payId": 5227105,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687743,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-06 16:26:33",
                "createDate": 1696577194821,
                "modifyDate": 1696577194821,
                "version": 0,
                "createdAt": "2023-10-06 16:26:34",
                "modifiedAt": "2023-10-06 16:26:34"
            },
            {
                "payId": 5227110,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687747,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-06 16:27:13",
                "createDate": 1696577234825,
                "modifyDate": 1696577234825,
                "version": 0,
                "createdAt": "2023-10-06 16:27:14",
                "modifiedAt": "2023-10-06 16:27:14"
            },
            {
                "payId": 5227144,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687747,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -8000,
                "payDate": "2023-10-06 16:32:34",
                "createDate": 1696577555221,
                "modifyDate": 1696577555221,
                "version": 0,
                "createdAt": "2023-10-06 16:32:35",
                "modifiedAt": "2023-10-06 16:32:35"
            },
            {
                "payId": 5227152,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687743,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -8000,
                "payDate": "2023-10-06 16:33:19",
                "createDate": 1696577600745,
                "modifyDate": 1696577600745,
                "version": 0,
                "createdAt": "2023-10-06 16:33:20",
                "modifiedAt": "2023-10-06 16:33:20"
            },
            {
                "payId": 5227153,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687728,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -21000,
                "payDate": "2023-10-06 16:33:38",
                "createDate": 1696577619972,
                "modifyDate": 1696577619972,
                "version": 0,
                "createdAt": "2023-10-06 16:33:39",
                "modifiedAt": "2023-10-06 16:33:39"
            },
            {
                "payId": 5227154,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687698,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -10000,
                "payDate": "2023-10-06 16:34:02",
                "createDate": 1696577643734,
                "modifyDate": 1696577643734,
                "version": 0,
                "createdAt": "2023-10-06 16:34:03",
                "modifiedAt": "2023-10-06 16:34:03"
            },
            {
                "payId": 5227163,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5687718,
                "requestType": "매장",
                "payVendor": "nicecat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -6000,
                "payDate": "2023-10-06 16:35:19",
                "createDate": 1696577721955,
                "modifyDate": 1696577721955,
                "version": 0,
                "createdAt": "2023-10-06 16:35:21",
                "modifiedAt": "2023-10-06 16:35:21"
            },
            {
                "payId": 5246579,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5709935,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 7500,
                "payDate": "2023-10-10 12:01:57",
                "createDate": 1696906917642,
                "modifyDate": 1696906917642,
                "version": 0,
                "createdAt": "2023-10-10 12:01:57",
                "modifiedAt": "2023-10-10 12:01:57"
            },
            {
                "payId": 5246596,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5710707,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 210000,
                "payDate": "2023-10-10 12:02:23",
                "createDate": 1696906944055,
                "modifyDate": 1696906944055,
                "version": 0,
                "createdAt": "2023-10-10 12:02:24",
                "modifiedAt": "2023-10-10 12:02:24"
            },
            {
                "payId": 5249742,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5713896,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-10 15:01:47",
                "createDate": 1696917707382,
                "modifyDate": 1696917707382,
                "version": 0,
                "createdAt": "2023-10-10 15:01:47",
                "modifiedAt": "2023-10-10 15:01:47"
            },
            {
                "payId": 5249743,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5713836,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 26000,
                "payDate": "2023-10-10 15:01:56",
                "createDate": 1696917716243,
                "modifyDate": 1696917716243,
                "version": 0,
                "createdAt": "2023-10-10 15:01:56",
                "modifiedAt": "2023-10-10 15:01:56"
            },
            {
                "payId": 5259419,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5724103,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 37000,
                "payDate": "2023-10-11 16:19:45",
                "createDate": 1697008783216,
                "modifyDate": 1697008783216,
                "version": 0,
                "createdAt": "2023-10-11 16:19:43",
                "modifiedAt": "2023-10-11 16:19:43"
            },
            {
                "payId": 5259425,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5723906,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 7000,
                "payDate": "2023-10-11 16:21:15",
                "createDate": 1697008873431,
                "modifyDate": 1697008873431,
                "version": 0,
                "createdAt": "2023-10-11 16:21:13",
                "modifiedAt": "2023-10-11 16:21:13"
            },
            {
                "payId": 5259434,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5724122,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-11 16:22:23",
                "createDate": 1697008941056,
                "modifyDate": 1697008941056,
                "version": 0,
                "createdAt": "2023-10-11 16:22:21",
                "modifiedAt": "2023-10-11 16:22:21"
            },
            {
                "payId": 5259531,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5724247,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 24000,
                "payDate": "2023-10-11 16:41:49",
                "createDate": 1697010106972,
                "modifyDate": 1697010106972,
                "version": 0,
                "createdAt": "2023-10-11 16:41:46",
                "modifiedAt": "2023-10-11 16:41:46"
            },
            {
                "payId": 5259539,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5724257,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-11 16:42:56",
                "createDate": 1697010174129,
                "modifyDate": 1697010174129,
                "version": 0,
                "createdAt": "2023-10-11 16:42:54",
                "modifiedAt": "2023-10-11 16:42:54"
            },
            {
                "payId": 5259549,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5724263,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 14000,
                "payDate": "2023-10-11 16:43:46",
                "createDate": 1697010223834,
                "modifyDate": 1697010223834,
                "version": 0,
                "createdAt": "2023-10-11 16:43:43",
                "modifiedAt": "2023-10-11 16:43:43"
            },
            {
                "payId": 5259601,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5724241,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-11 16:51:02",
                "createDate": 1697010660070,
                "modifyDate": 1697010660070,
                "version": 0,
                "createdAt": "2023-10-11 16:51:00",
                "modifiedAt": "2023-10-11 16:51:00"
            },
            {
                "payId": 5259603,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5724317,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-11 16:51:11",
                "createDate": 1697010668621,
                "modifyDate": 1697010668621,
                "version": 0,
                "createdAt": "2023-10-11 16:51:08",
                "modifiedAt": "2023-10-11 16:51:08"
            },
            {
                "payId": 5304092,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5772624,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-17 16:57:05",
                "createDate": 1697529425237,
                "modifyDate": 1697529425237,
                "version": 0,
                "createdAt": "2023-10-17 16:57:05",
                "modifiedAt": "2023-10-17 16:57:05"
            },
            {
                "payId": 5316629,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5785992,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-19 11:15:42",
                "createDate": 1697681742543,
                "modifyDate": 1697681742543,
                "version": 0,
                "createdAt": "2023-10-19 11:15:42",
                "modifiedAt": "2023-10-19 11:15:42"
            },
            {
                "payId": 5316762,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5786179,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 6000,
                "payDate": "2023-10-19 11:26:37",
                "createDate": 1697682397990,
                "modifyDate": 1697682397990,
                "version": 0,
                "createdAt": "2023-10-19 11:26:37",
                "modifiedAt": "2023-10-19 11:26:37"
            },
            {
                "payId": 5317092,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5785992,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "cancel",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -8000,
                "payDate": "2023-10-19 11:45:40",
                "createDate": 1697683540372,
                "modifyDate": 1697683540372,
                "version": 0,
                "createdAt": "2023-10-19 11:45:40",
                "modifiedAt": "2023-10-19 11:45:40"
            },
            {
                "payId": 5317205,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5786692,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-19 11:50:31",
                "createDate": 1697683831910,
                "modifyDate": 1697683831910,
                "version": 0,
                "createdAt": "2023-10-19 11:50:31",
                "modifiedAt": "2023-10-19 11:50:31"
            },
            {
                "payId": 5319115,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5788683,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-19 13:15:20",
                "createDate": 1697688920498,
                "modifyDate": 1697688920498,
                "version": 0,
                "createdAt": "2023-10-19 13:15:20",
                "modifiedAt": "2023-10-19 13:15:20"
            },
            {
                "payId": 5327694,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5797694,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-10-20 14:09:22",
                "createDate": 1697778562735,
                "modifyDate": 1697778562735,
                "version": 0,
                "createdAt": "2023-10-20 14:09:22",
                "modifiedAt": "2023-10-20 14:09:22"
            },
            {
                "payId": 5328962,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5797694,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "cancel",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -8000,
                "payDate": "2023-10-20 17:04:59",
                "createDate": 1697789097766,
                "modifyDate": 1697789097766,
                "version": 0,
                "createdAt": "2023-10-20 17:04:57",
                "modifiedAt": "2023-10-20 17:04:57"
            },
            {
                "payId": 5329371,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5786692,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "cancel",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -8000,
                "payDate": "2023-10-20 18:05:30",
                "createDate": 1697792731661,
                "modifyDate": 1697792731661,
                "version": 0,
                "createdAt": "2023-10-20 18:05:31",
                "modifiedAt": "2023-10-20 18:05:31"
            },
            {
                "payId": 5348483,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5821161,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 7500,
                "payDate": "2023-10-23 18:16:03",
                "createDate": 1698052563091,
                "modifyDate": 1698052563091,
                "version": 0,
                "createdAt": "2023-10-23 18:16:03",
                "modifiedAt": "2023-10-23 18:16:03"
            },
            {
                "payId": 5348524,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5821202,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 15000,
                "payDate": "2023-10-23 18:22:24",
                "createDate": 1698052944253,
                "modifyDate": 1698052944253,
                "version": 0,
                "createdAt": "2023-10-23 18:22:24",
                "modifiedAt": "2023-10-23 18:22:24"
            },
            {
                "payId": 5348535,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5821239,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 7000,
                "payDate": "2023-10-23 18:23:46",
                "createDate": 1698053026114,
                "modifyDate": 1698053026114,
                "version": 0,
                "createdAt": "2023-10-23 18:23:46",
                "modifiedAt": "2023-10-23 18:23:46"
            },
            {
                "payId": 5359831,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5788683,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "cancel",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -8000,
                "payDate": "2023-10-25 10:21:54",
                "createDate": 1698196913952,
                "modifyDate": 1698196913952,
                "version": 0,
                "createdAt": "2023-10-25 10:21:53",
                "modifiedAt": "2023-10-25 10:21:53"
            },
            {
                "payId": 5359834,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5786179,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "cancel",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -6000,
                "payDate": "2023-10-25 10:22:07",
                "createDate": 1698196927190,
                "modifyDate": 1698196927190,
                "version": 0,
                "createdAt": "2023-10-25 10:22:07",
                "modifiedAt": "2023-10-25 10:22:07"
            },
            {
                "payId": 5359884,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5821239,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -7000,
                "payDate": "2023-10-25 10:27:20",
                "createDate": 1698197239848,
                "modifyDate": 1698197239848,
                "version": 0,
                "createdAt": "2023-10-25 10:27:19",
                "modifiedAt": "2023-10-25 10:27:19"
            },
            {
                "payId": 5359887,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5821202,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -15000,
                "payDate": "2023-10-25 10:27:35",
                "createDate": 1698197254788,
                "modifyDate": 1698197254788,
                "version": 0,
                "createdAt": "2023-10-25 10:27:34",
                "modifiedAt": "2023-10-25 10:27:34"
            },
            {
                "payId": 5359889,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5821161,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -7500,
                "payDate": "2023-10-25 10:27:44",
                "createDate": 1698197263654,
                "modifyDate": 1698197263654,
                "version": 0,
                "createdAt": "2023-10-25 10:27:43",
                "modifiedAt": "2023-10-25 10:27:43"
            },
            {
                "payId": 5359899,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5772624,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "cancel",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -8000,
                "payDate": "2023-10-25 10:28:36",
                "createDate": 1698197316035,
                "modifyDate": 1698197316035,
                "version": 0,
                "createdAt": "2023-10-25 10:28:36",
                "modifiedAt": "2023-10-25 10:28:36"
            },
            {
                "payId": 5359903,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5724247,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -24000,
                "payDate": "2023-10-25 10:29:09",
                "createDate": 1698197349062,
                "modifyDate": 1698197349062,
                "version": 0,
                "createdAt": "2023-10-25 10:29:09",
                "modifiedAt": "2023-10-25 10:29:09"
            },
            {
                "payId": 5420562,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5898109,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 17000,
                "payDate": "2023-11-02 10:08:00",
                "createDate": 1698887280245,
                "modifyDate": 1698887280245,
                "version": 0,
                "createdAt": "2023-11-02 10:08:00",
                "modifiedAt": "2023-11-02 10:08:00"
            },
            {
                "payId": 5420567,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5898100,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 15000,
                "payDate": "2023-11-02 10:08:14",
                "createDate": 1698887294532,
                "modifyDate": 1698887294532,
                "version": 0,
                "createdAt": "2023-11-02 10:08:14",
                "modifiedAt": "2023-11-02 10:08:14"
            },
            {
                "payId": 5421077,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5898212,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 29500,
                "payDate": "2023-11-02 10:54:16",
                "createDate": 1698890056435,
                "modifyDate": 1698890056435,
                "version": 0,
                "createdAt": "2023-11-02 10:54:16",
                "modifiedAt": "2023-11-02 10:54:16"
            },
            {
                "payId": 5421079,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5841020,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 12000,
                "payDate": "2023-11-02 10:54:23",
                "createDate": 1698890063434,
                "modifyDate": 1698890063434,
                "version": 0,
                "createdAt": "2023-11-02 10:54:23",
                "modifiedAt": "2023-11-02 10:54:23"
            },
            {
                "payId": 5421080,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5894318,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 16000,
                "payDate": "2023-11-02 10:54:28",
                "createDate": 1698890068779,
                "modifyDate": 1698890068779,
                "version": 0,
                "createdAt": "2023-11-02 10:54:28",
                "modifiedAt": "2023-11-02 10:54:28"
            },
            {
                "payId": 5423266,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5900931,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 18000,
                "payDate": "2023-11-02 12:41:20",
                "createDate": 1698896481036,
                "modifyDate": 1698896481036,
                "version": 0,
                "createdAt": "2023-11-02 12:41:21",
                "modifiedAt": "2023-11-02 12:41:21"
            },
            {
                "payId": 5423272,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5900914,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-11-02 12:41:36",
                "createDate": 1698896496177,
                "modifyDate": 1698896496177,
                "version": 0,
                "createdAt": "2023-11-02 12:41:36",
                "modifiedAt": "2023-11-02 12:41:36"
            },
            {
                "payId": 5423393,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5901008,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-11-02 12:46:27",
                "createDate": 1698896787314,
                "modifyDate": 1698896787314,
                "version": 0,
                "createdAt": "2023-11-02 12:46:27",
                "modifiedAt": "2023-11-02 12:46:27"
            },
            {
                "payId": 5423662,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5901379,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 10000,
                "payDate": "2023-11-02 12:58:24",
                "createDate": 1698897504237,
                "modifyDate": 1698897504237,
                "version": 0,
                "createdAt": "2023-11-02 12:58:24",
                "modifiedAt": "2023-11-02 12:58:24"
            },
            {
                "payId": 5446821,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5927231,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 1,
                "amount": 7000,
                "payDate": "2023-11-06 09:30:10",
                "createDate": 1699230611951,
                "modifyDate": 1699230611951,
                "version": 0,
                "createdAt": "2023-11-06 09:30:11",
                "modifiedAt": "2023-11-06 09:30:11"
            },
            {
                "payId": 5446869,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5913536,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 15000,
                "payDate": "2023-11-06 09:34:51",
                "createDate": 1699230893475,
                "modifyDate": 1699230893475,
                "version": 0,
                "createdAt": "2023-11-06 09:34:53",
                "modifiedAt": "2023-11-06 09:34:53"
            },
            {
                "payId": 5446874,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5913536,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -15000,
                "payDate": "2023-11-06 09:35:22",
                "createDate": 1699230924386,
                "modifyDate": 1699230924386,
                "version": 0,
                "createdAt": "2023-11-06 09:35:24",
                "modifiedAt": "2023-11-06 09:35:24"
            },
            {
                "payId": 5446933,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5901008,
                "requestType": "매장",
                "payVendor": "none",
                "payAction": "cancel",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -8000,
                "payDate": "2023-11-06 09:41:11",
                "createDate": 1699231271892,
                "modifyDate": 1699231271892,
                "version": 0,
                "createdAt": "2023-11-06 09:41:11",
                "modifiedAt": "2023-11-06 09:41:11"
            },
            {
                "payId": 5447390,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5927835,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "approve",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 56000,
                "payDate": "2023-11-06 10:26:15",
                "createDate": 1699233977246,
                "modifyDate": 1699233977246,
                "version": 0,
                "createdAt": "2023-11-06 10:26:17",
                "modifiedAt": "2023-11-06 10:26:17"
            },
            {
                "payId": 5447403,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5927835,
                "requestType": "매장",
                "payVendor": "winkcpvcat",
                "payAction": "cancel",
                "payMethod": "신용카드",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -56000,
                "payDate": "2023-11-06 10:27:44",
                "createDate": 1699234066184,
                "modifyDate": 1699234066184,
                "version": 0,
                "createdAt": "2023-11-06 10:27:46",
                "modifiedAt": "2023-11-06 10:27:46"
            },
            {
                "payId": 5452114,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5932833,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 5000,
                "payDate": "2023-11-06 15:24:15",
                "createDate": 1699251855777,
                "modifyDate": 1699251855777,
                "version": 0,
                "createdAt": "2023-11-06 15:24:15",
                "modifiedAt": "2023-11-06 15:24:15"
            },
            {
                "payId": 5452127,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5932833,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "cancel",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": -5000,
                "payDate": "2023-11-06 15:25:39",
                "createDate": 1699251939415,
                "modifyDate": 1699251939415,
                "version": 0,
                "createdAt": "2023-11-06 15:25:39",
                "modifiedAt": "2023-11-06 15:25:39"
            },
            {
                "payId": 5452256,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5932970,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-11-06 15:41:23",
                "createDate": 1699252884046,
                "modifyDate": 1699252884046,
                "version": 0,
                "createdAt": "2023-11-06 15:41:24",
                "modifiedAt": "2023-11-06 15:41:24"
            },
            {
                "payId": 5452263,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5932976,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-11-06 15:42:05",
                "createDate": 1699252925651,
                "modifyDate": 1699252925651,
                "version": 0,
                "createdAt": "2023-11-06 15:42:05",
                "modifiedAt": "2023-11-06 15:42:05"
            },
            {
                "payId": 5452270,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5932986,
                "requestType": "매장",
                "payVendor": "bizplay",
                "payAction": "approve",
                "payMethod": "bizplay",
                "payType": "일반",
                "isReceiptIssued": 0,
                "amount": 8000,
                "payDate": "2023-11-06 15:43:04",
                "createDate": 1699252984812,
                "modifyDate": 1699252984812,
                "version": 0,
                "createdAt": "2023-11-06 15:43:04",
                "modifiedAt": "2023-11-06 15:43:04"
            },
            {
                "payId": 5555482,
                "parentStoreId": 201,
                "parentStoreName": "레츠온 본사",
                "storeId": 203,
                "storeName": "메뉴팡",
                "licenseName": null,
                "licenseNumber": "10010003",
                "representative": "레츠온클라우드",
                "representTel": "027233591",
                "dealId": 5946318,
                "requestType": "매장",
                "payVendor": "winsmartrovcat",
                "payAction": "approve",
                "payMethod": "현금",
                "payType": "일반",
                "isReceiptIssued": 1,
                "amount": 8000,
                "payDate": "2023-11-20 13:50:41",
                "createDate": 1700455844108,
                "modifyDate": 1700455844108,
                "version": 0,
                "createdAt": "2023-11-20 13:50:44",
                "modifiedAt": "2023-11-20 13:50:44"
            }

        ]
    }
}';

// Decode JSON data
$data = json_decode($jsonData, true);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extract payDetails array
$payDetails = $data['data']['payDetails'];

// Prepare and execute INSERT queries
// foreach ($payDetails as $payDetail) {

//     $sql = "INSERT INTO smallbee (payId, parentStoreId, parentStoreName, storeId, storeName, licenseName, licenseNumber, representative, representTel, dealId, requestType, payVendor, payAction, payMethod, payType, isReceiptIssued, amount, payDate, createDate, modifyDate, version, createdAt, modifiedAt) 
//     VALUES (
//         '{$payDetail['payId']}', '{$payDetail['parentStoreId']}', '{$payDetail['parentStoreName']}', '{$payDetail['storeId']}', '{$payDetail['storeName']}', '{$payDetail['licenseName']}', '{$payDetail['licenseNumber']}', '{$payDetail['representative']}', '{$payDetail['representTel']}', '{$payDetail['dealId']}', '{$payDetail['requestType']}', '{$payDetail['payVendor']}', '{$payDetail['payAction']}', '{$payDetail['payMethod']}', '{$payDetail['payType']}', '{$payDetail['isReceiptIssued']}', '{$payDetail['amount']}', '{$payDetail['payDate']}', '{$payDetail['createDate']}', '{$payDetail['modifyDate']}', '{$payDetail['version']}', '{$payDetail['createdAt']}', '{$payDetail['modifiedAt']}')";

//     if ($conn->query($sql) !== TRUE) {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

echo "<div class=\"wrap\">";

$sql = "SELECT * FROM smallbee";

$result = $conn->query($sql);

// Check if the query returned results
$amount_all = 0;
$row_count = 0;

$parentStoreName = '';
$storeName = '';
$all_take = 0;

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {

        $amount_all += $row['amount'];
        // Process each row's data
        
        $parentStoreName = $row['parentStoreName'];
        $storeName = $row['storeName'];
        $representTel = $row['representTel'];
        $storeId = $row['storeId'];
    }

    echo "<pre>";
    print_r("가맹점 정보");
    echo "</pre>";
    echo "<pre>";
    print_r('본사: '.$parentStoreName);
    echo "</pre>";
    echo "<pre>";
    print_r('가맹점명: '.$storeName);
    echo "</pre>";
    echo "<pre>";
    print_r('가맹점ID: '.$storeId);
    echo "</pre>";
    echo "<pre>";
    print_r('전화번호: '.$representTel);
    echo "</pre>";
    echo "<pre>";
    print_r('total_amount: '.$amount_all);
    echo "</pre>";
} else {
    echo "0 results";
}



$sql_sum = "SELECT SUM(amount) AS row_amount, COUNT(*) AS row_count FROM smallbee";
$result_sum = $conn->query($sql_sum);

if (!$result_sum) {
    echo "Error executing query: " . $conn->error;
} else {
    // Fetch and display the result
    $row_sum = $result_sum->fetch_assoc();
    $row_amount = $row_sum['row_amount'];
    $row_count = $row_sum['row_count'];
    $row_avg = $row_amount / $row_count;

    $all_take = round($row_amount, 0);

    echo "<pre>";
    print_r("총매출금액(외상포함..): " .round($row_amount, 0).'원');
    echo "</pre>";
    
    echo "<pre>";
    print_r("총 금액 평균: " .round($row_avg, 1).'원');
    echo "</pre>";
}



echo "<br>";


$specificDate = '2023-11-06';

$sql_sum_date = "SELECT SUM(amount) AS row_amount, COUNT(*) AS row_count FROM smallbee WHERE DATE(payDate)='$specificDate'";
$result_sum_date = $conn->query($sql_sum_date);

if (!$result_sum_date) {
    echo "Error executing query: " . $conn->error;
} else {
    // Fetch and display the result
    $row_sum_date = $result_sum_date->fetch_assoc();
    $row_amount_date = $row_sum_date['row_amount'];
    $row_count_date = $row_sum_date['row_count'];
    $row_avg_date = $row_amount_date / $row_count_date;

    echo "<pre>";
    print_r("총매출금액(외상포함..): " .round($row_amount_date, 0).'원');
    echo "</pre>";
    
    echo "<pre>";
    print_r("총 금액 평균: " .round($row_avg_date, 1).'원');
    echo "</pre>";
}



echo "<br>";



$sql_payMethod_card = "SELECT COUNT(*) AS count_card, SUM(amount) as amount_card FROM smallbee WHERE payMethod='신용카드'";
$result_payMethod_card = $conn->query($sql_payMethod_card);
if ($result_payMethod_card->num_rows > 0) {
    

    $row_card_count = $result_payMethod_card->fetch_assoc();
    $card_count = $row_card_count['count_card'];
    echo "<pre>";
    print_r('카드 결제 횟수: '.$card_count);
    echo "</pre>";

    $pay_per_card = $card_count / $row_count * 100;

    echo "<pre>";
    print_r('카드 결제 비율: '.round($pay_per_card, 1).'%');
    echo "</pre>";

    $amount_card = $row_card_count['amount_card'];
    echo "<pre>";
    print_r('카드 결제 금액: '.$amount_card.'원');
    echo "</pre>";
    
} else {
    echo "0 results";
}



echo "<br>";



$sql_payMethod_cash = "SELECT COUNT(*) AS count_cash, SUM(amount) as amount_cash FROM smallbee WHERE payMethod='현금'";
$result_payMethod_cash = $conn->query($sql_payMethod_cash);
if ($result_payMethod_cash->num_rows > 0) {
    

    $row_cash_count = $result_payMethod_cash->fetch_assoc();
    $card_count = $row_cash_count['count_cash'];
    echo "<pre>";
    print_r('현금 결제 횟수: '.$card_count);
    echo "</pre>";

    $pay_per_cash = $card_count / $row_count * 100;

    echo "<pre>";
    print_r('현금 결제 비율: '.round($pay_per_cash, 1).'%');
    echo "</pre>";

    $amount_cash = $row_cash_count['amount_cash'];
    echo "<pre>";
    print_r('현금 결제 금액: '.round($amount_cash, 0).'원');
    echo "</pre>";
    
} else {
    echo "0 results";
}



echo "<br>";



$sql_payMethod_credit = "SELECT COUNT(*) AS count_credit, SUM(amount) as amount_credit FROM smallbee WHERE payMethod='외상'";
$result_payMethod_credit = $conn->query($sql_payMethod_credit);
if ($result_payMethod_credit->num_rows > 0) {
    

    $row_credit_count = $result_payMethod_credit->fetch_assoc();
    $card_count = $row_credit_count['count_credit'];
    echo "<pre>";
    print_r('외상 횟수: '.$card_count);
    echo "</pre>";

    $pay_per_credit = $card_count / $row_count * 100;

    echo "<pre>";
    print_r('외상 비율: '.round($pay_per_credit, 1).'%');
    echo "</pre>";

    $amount_credit = $row_credit_count['amount_credit'];
    echo "<pre>";
    print_r('외상 금액: '.round($amount_credit, 0).'원');
    echo "</pre>";
    
} else {
    echo "0 results";
}



echo "<br>";



$sql_payMethod_biz = "SELECT COUNT(*) AS count_biz, SUM(amount) as amount_biz FROM smallbee WHERE payMethod='bizplay'";
$result_payMethod_biz = $conn->query($sql_payMethod_biz);
if ($result_payMethod_biz->num_rows > 0) {
    

    $row_biz_count = $result_payMethod_biz->fetch_assoc();
    $card_count = $row_biz_count['count_biz'];
    echo "<pre>";
    print_r('bizplay 결제 횟수: '.$card_count);
    echo "</pre>";

    $pay_per_biz = $card_count / $row_count * 100;

    echo "<pre>";
    print_r('bizplay 결제 비율: '.round($pay_per_biz, 1).'%');
    echo "</pre>";

    $amount_biz = $row_biz_count['amount_biz'];
    echo "<pre>";
    print_r('bizplay 결제 금액: '.round($amount_biz, 0).'원');
    echo "</pre>";
    
} else {
    echo "0 results";
}



echo "<br>";


$payMethod_ctgry = '';

$sql_payMethod_ctgry = "SELECT DISTINCT payMethod FROM smallbee";
$sql_payMethod_count = "SELECT COUNT(DISTINCT payMethod) AS payMethod_count FROM smallbee";

$result_payMethod_ctgry = $conn->query($sql_payMethod_ctgry);
$result_payMethod_count = $conn->query($sql_payMethod_count);

if ($result_payMethod_ctgry->num_rows > 0) {
    // Output data of each row

    $payMethod_ctgry .= '<h5 class="payMethod_ctgry_title">결제방식</h5>';
    $payMethod_ctgry .= '<ul class="payMethod_ctgry list_basic">';
    while ($row = $result_payMethod_ctgry->fetch_assoc()) {
        $payMethod_ctgry .= '<li>'.$row['payMethod'].'</li>';
    }
    $payMethod_ctgry .= '</ul>';


    $row2 = $result_payMethod_count->fetch_assoc();
    echo "<pre>";

    $payMethod_ctgry .= '<span class="ctgry_count">총 '.$row2['payMethod_count'].'개</span>';

} else {
    $payMethod_ctgry .= '0 results';
}




echo "<br>";





$sql_period_year = "SELECT YEAR(payDate) AS year, COUNT(*) AS data_count
        FROM smallbee
        GROUP BY YEAR(payDate)
        ORDER BY YEAR(payDate)";
$result_period_year = $conn->query($sql_period_year);

if ($result_period_year) {
    while ($row_period = $result_period_year->fetch_assoc()) {
        echo "<pre>";
        print_r($row_period['year']." / ".$row_period['month']."년 결제건수: " . $row_period['data_count']);
        echo "</pre>";

        $t_year = $row_period['year'];



        $year_amount = 0;
        //월별 매출금액
        $sql_period_year_dtl = "SELECT *
        FROM smallbee
        WHERE DATE_FORMAT(payDate, '%Y') = '$t_year'";

        $result_period_year_dtl = $conn->query($sql_period_year_dtl);
        
        if ($result_period_year_dtl) {
            while ($row_period_year_dtl = $result_period_year_dtl->fetch_assoc()) {
                $year_amount += $row_period_year_dtl['amount'];

                

            }
            echo "<pre>";
            print_r($t_year.'년 총 매출금액: '.round($year_amount, 0).'원');
            echo "</pre>";
            echo "<Br/>";
        } else {
            echo "쿼리 실행 중 에러: " . $conn->error;
        }
    }
} else {
    echo "쿼리 실행 중 에러: " . $conn->error;
}







$sql_period = "SELECT YEAR(payDate) AS year, MONTH(payDate) AS month, COUNT(*) AS data_count
        FROM smallbee
        GROUP BY YEAR(payDate), MONTH(payDate)
        ORDER BY YEAR(payDate), MONTH(payDate)";
$result_period = $conn->query($sql_period);

$month_payMethod_text = '';

if ($result_period) {
    while ($row_period = $result_period->fetch_assoc()) {
        echo "<pre>";
        print_r($row_period['year']."-".$row_period['month']." / ".$row_period['month']."월 결제건수: " . $row_period['data_count']);
        echo "</pre>";

        $data_count = $row_period['data_count'];

        $t_year = $row_period['year'];
        $t_month = $row_period['month'];
        $t_month_serch = $row_period['month'];
        
        if ( strlen($t_month_serch) === 1) {
            $t_month_serch = '0'.$t_month_serch;
        }




        
        $month_amount = 0;
        $month_payMethod_card = 0;
        $month_amount_card = 0;
        $month_payMethod_cash = 0;
        $month_amount_cash = 0;
        $month_payMethod_credit = 0;
        $month_amount_credit = 0;
        $month_payMethod_biz = 0;
        $month_amount_biz = 0;
        //월별 매출금액
        $sql_period_month = "SELECT *
        FROM smallbee
        WHERE DATE_FORMAT(payDate, '%Y-%m') = '$t_year-$t_month_serch'";

        $sql_period_month_amount = "SELECT payMethod, SUM(amount) 
        AS ctgry_amount
        FROM smallbee
        WHERE DATE_FORMAT(payDate, '%Y-%m') = '$t_year-$t_month_serch'
        GROUP BY payMethod;";

        $result_period_month = $conn->query($sql_period_month);
        $result_period_month_amount = $conn->query($sql_period_month_amount);
        
        $array_row_period_month = [];
        if ($result_period_month) {
            while ($row_period_month = $result_period_month->fetch_assoc()) {


                $month_amount += $row_period_month['amount'];                
                
                switch ($row_period_month['payMethod']) {  
                    case '신용카드':
                        $month_payMethod_card ++;
                        
                        break;
                    case '현금':
                        $month_payMethod_cash ++;
                        break;
                    case '외상':
                        $month_payMethod_credit ++;
                        break;
                    case 'bizplay':
                        $month_payMethod_biz ++;
                        break;
                    
                    default:
                        # code...
                        break;
                }

            }

            while ($row_period_month_amount = $result_period_month_amount->fetch_assoc()) {

                switch ($row_period_month_amount['payMethod']) {
                    case '신용카드':
                        $month_amount_card = round($row_period_month_amount['ctgry_amount'], 0);
                        break;
                    case '현금':
                        $month_amount_cash = round($row_period_month_amount['ctgry_amount'], 0);
                        break;
                    case '외상':
                        $month_amount_credit = round($row_period_month_amount['ctgry_amount'], 0);
                        break;
                    case 'bizplay':
                        $month_amount_biz = round($row_period_month_amount['ctgry_amount'], 0);
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }

            // 결제수단 별 퍼센트
            $month_payMethod_text .= '<div class="month_payMethod_prt box_wrap">';
            $month_payMethod_text .= '    <div class="month_payMethod_wrap" type="card">';
            $month_payMethod_text .= '        <span class="title">신용카드</span>';
            $month_payMethod_text .= '        <div class="month_payMethod">';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월별 결제 금액</span>';
            $month_payMethod_text .= '                <span class="per">'.$month_amount_card.'원</span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '            <span class="count">'.$month_payMethod_card.'회</span>';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월별 카드 결제 비율</span>';
            $month_payMethod_text .= '                <span class="per">'.round(($month_payMethod_card / $data_count*100),1).'%</span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월 사용횟수 증감률</span>';
            $month_payMethod_text .= '                <span class="change"></span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '        </div>';
            $month_payMethod_text .= '    </div>';
            $month_payMethod_text .= '    <div class="month_payMethod_wrap" type="cash">';
            $month_payMethod_text .= '        <span class="title">현금</span>';
            $month_payMethod_text .= '        <div class="month_payMethod">';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월별 결제 금액</span>';
            $month_payMethod_text .= '                <span class="per">'.$month_amount_cash.'원</span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '            <span class="count">'.$month_payMethod_cash.'회</span>';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월별 현금 결제 비율</span>';
            $month_payMethod_text .= '                <span class="per">'.round(($month_payMethod_cash / $data_count*100),1).'%</span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월 사용횟수 증감률</span>';
            $month_payMethod_text .= '                <span class="change"></span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '        </div>';
            $month_payMethod_text .= '    </div>';
            $month_payMethod_text .= '    <div class="month_payMethod_wrap" type="credit">';
            $month_payMethod_text .= '        <span class="title">외상</span>';
            $month_payMethod_text .= '        <div class="month_payMethod">';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월별 결제 금액</span>';
            $month_payMethod_text .= '                <span class="per">'.$month_amount_credit.'원</span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '            <span class="count">'.$month_payMethod_credit.'회</span>';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월별 외상률</span>';
            $month_payMethod_text .= '                <span class="per">'.round(($month_payMethod_credit / $data_count*100),1).'%</span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월 사용횟수 증감률</span>';
            $month_payMethod_text .= '                <span class="change"></span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '        </div>';
            $month_payMethod_text .= '    </div>';
            $month_payMethod_text .= '    <div class="month_payMethod_wrap" type="biz">';
            $month_payMethod_text .= '        <span class="title">bizplay</span>';
            $month_payMethod_text .= '        <div class="month_payMethod">';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월별 결제 금액</span>';
            $month_payMethod_text .= '                <span class="per">'.$month_amount_biz.'원</span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '            <span class="count">'.$month_payMethod_biz.'회</span>';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월별 biz 결제 비율</span>';
            $month_payMethod_text .= '                <span class="per">'.round(($month_payMethod_biz / $data_count*100),1).'%</span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월 사용횟수 증감률</span>';
            $month_payMethod_text .= '                <span class="change"></span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '        </div>';
            $month_payMethod_text .= '    </div>';
            
            // 월 총 매출금액
            $month_payMethod_text .= '    <div class="month_payMethod_wrap all_amount">';
            $month_payMethod_text .= '        <span class="title">'.$t_month.'월 총 매출금액</span>';
            $month_payMethod_text .= '        <div class="month_payMethod">';
            $month_payMethod_text .= '            <span class="amount">'.round($month_amount, 0).'원</span>';
            $month_payMethod_text .= '            <div class="con">';
            $month_payMethod_text .= '                <span class="title"">월별 매출 증감률</span>';
            $month_payMethod_text .= '                <span class="amount_change"></span>';
            $month_payMethod_text .= '            </div>';
            $month_payMethod_text .= '        </div>';
            $month_payMethod_text .= '    </div>';
            $month_payMethod_text .= '</div>';

        } else {
            echo "쿼리 실행 중 에러: " . $conn->error;
        }
    }
} else {
    echo "쿼리 실행 중 에러: " . $conn->error;
}



echo "<br>";
echo "</div>";




echo "<br>";



// 결제대행사
$payVendor_ctgry = '';

$sql_payVendor_ctgry = "SELECT DISTINCT payVendor FROM smallbee";
$sql_payVendor_count = "SELECT COUNT(DISTINCT payVendor) AS payVendor_count FROM smallbee";

$result_payVendor_ctgry = $conn->query($sql_payVendor_ctgry);
$result_payVendor_count = $conn->query($sql_payVendor_count);



if ($result_payVendor_ctgry->num_rows > 0) {
    // Output data of each row

    $payVendor_ctgry .= '<h5 class="payVendor_ctgry_title">거래대행사</h5>';
    $payVendor_ctgry .= '<ul class="payVendor_ctgry list_basic box_wrap">';
    while ($row = $result_payVendor_ctgry->fetch_assoc()) {
        $payVendor_ctgry .= '<li>'.$row['payVendor'].'</li>';
    }
    $payVendor_ctgry .= '</ul>';


    $row2 = $result_payVendor_count->fetch_assoc();
    $payVendor_ctgry .= '<span class="ctgry_count">총 '.$row2['payVendor_count'].'개</span>';

} else {
    $payVendor_ctgry .= "0 results";
}



echo "<br>";



// 결제위치
$requestType_ctgry = '';

$sql_requestType_ctgry = "SELECT DISTINCT requestType FROM smallbee";
$sql_requestType_count = "SELECT COUNT(DISTINCT requestType) AS requestType_count FROM smallbee";

$result_requestType_ctgry = $conn->query($sql_requestType_ctgry);
$result_requestType_count = $conn->query($sql_requestType_count);



if ($result_requestType_ctgry->num_rows > 0) {
    // Output data of each row

    $requestType_ctgry .= '<h5 class="requestType_ctgry_title">결제처리위치</h5>';
    $requestType_ctgry .= '<ul class="requestType_ctgry list_basic">';
    while ($row = $result_requestType_ctgry->fetch_assoc()) {
        $requestType_ctgry .= '<li>'.$row['requestType'].'</li>';
    }
    $requestType_ctgry .= '</ul>';


    $row2 = $result_requestType_count->fetch_assoc();
    $requestType_ctgry .= '<span class="ctgry_count">총 '.$row2['requestType_count'].'개</span>';

} else {
    $requestType_ctgry .= "0 results";
}



echo "<br>";



// 식사 타입
$payType_ctgry = '';

$sql_payType_ctgry = "SELECT DISTINCT payType FROM smallbee";
$sql_payType_count = "SELECT COUNT(DISTINCT payType) AS payType_count FROM smallbee";

$result_payType_ctgry = $conn->query($sql_payType_ctgry);
$result_payType_count = $conn->query($sql_payType_count);



if ($result_payType_ctgry->num_rows > 0) {
    // Output data of each row

    $payType_ctgry .= '<h5 class="payType_ctgry_title">결제처리위치</h5>';
    $payType_ctgry .= '<ul class="payType_ctgry list_basic">';
    while ($row = $result_payType_ctgry->fetch_assoc()) {
        $payType_ctgry .= '<li>'.$row['payType'].'</li>';
    }
    $payType_ctgry .= '</ul>';


    $row2 = $result_payType_count->fetch_assoc();
    $payType_ctgry .= '<span class="ctgry_count">총 '.$row2['payType_count'].'개</span>';

} else {
    $payType_ctgry .= "0 results";
}



echo "<br>";



// 식사 타입
$payType_ctgry = '';
$payType_ctgry_rate_text = '';
$payType_requestType_text = '';
$payType_count = 0;

$sql_payType_ctgry = "SELECT payType, COUNT(*) AS count FROM smallbee GROUP BY payType;";

$result_payType_ctgry = $conn->query($sql_payType_ctgry);

if ($result_payType_ctgry->num_rows > 0) {
    // Output data of each row

    $payType_ctgry .= '<h5 class="payType_ctgry_title">결제처리위치</h5>';
    $payType_ctgry .= '<ul class="payType_ctgry list_basic box_wrap">';
    while ($row = $result_payType_ctgry->fetch_assoc()) {
        $payType_ctgry .= '<li>'.$row['payType'].'</li>';

        $payType = $row['payType'];
        
        $payType_ctgry_rate_text .= '<p>'.$row['payType'].': '.$row['count'].'</p>';
        
        $payType_per = round(($row['count'] / $row_count) * 100, 2);


        $payType_ctgry_rate_text .= '<p>'.$row['payType'].': '.$payType_per.'%</p>';

        
        $sql_payType_requestType = "SELECT payType, requestType, COUNT(*) AS count_per_location
        FROM smallbee
        WHERE payType = '{$payType}'
        GROUP BY payType, requestType;";

        $result_payType_requestType = $conn->query($sql_payType_requestType);
        
        if ($result_payType_requestType->num_rows > 0) {

            $payType_requestType_text .= '<ul class="payType_requestType">';
            $payType_requestType_text .= '    <li class="title">';
            $payType_requestType_text .= '        <div class="title_wrap">';
            $payType_requestType_text .= '            <span class="title">전달방법</span>';
            $payType_requestType_text .= '            <span class="title">'.$payType.'</span>';
            $payType_requestType_text .= '        </div>';
            $payType_requestType_text .= '    </li>';

            while ($row_2 = $result_payType_requestType->fetch_assoc()) {

                $payType_requestType_text .= '    <li>';
                $payType_requestType_text .= '        <div class="con_wrap">';
                $payType_requestType_text .= '            <span class="title">결제위치</span>';
                $payType_requestType_text .= '            <span class="con">'.$row_2['requestType'].'</span>';
                $payType_requestType_text .= '        </div>';
                $payType_requestType_text .= '        <div class="con_wrap">';
                $payType_requestType_text .= '            <span class="title">결제횟수</span>';
                $payType_requestType_text .= '            <span class="con">'.$row_2['count_per_location'].'</span>';
                $payType_requestType_text .= '        </div>';
                $payType_requestType_text .= '    </li>';
            }
            $payType_requestType_text .= '</ul>';
        }
    }
    $payType_ctgry .= '</ul>';


} else {
    $payType_ctgry .= "0 results";
}


$sql_payAction_amount_text = '';
$sql_payAction_amount = "SELECT payAction, SUM(amount) AS action_month
FROM smallbee
GROUP BY payAction;";

$result_payAction_amount = $conn->query($sql_payAction_amount);

if ($result_payAction_amount->num_rows > 0) {
    while ($row_payAction_amount = $result_payAction_amount->fetch_assoc()) {        

        $payAction_kr = ($row_payAction_amount['payAction'] == 'approve')? ' 결제승인' : '결제취소';
        
        $sql_payAction_amount_text .= '<li>';
        $sql_payAction_amount_text .= '    <div class="title">';
        $sql_payAction_amount_text .= '        <span class="title">'.$payAction_kr.'</span>';
        $sql_payAction_amount_text .= '    </div>';
        $sql_payAction_amount_text .= '    <div class="con">';
        $sql_payAction_amount_text .= '        <span class="data">'.round(abs($row_payAction_amount['action_month']), 0).'</span>';
        $sql_payAction_amount_text .= '        <span class="won">원</span>';
        $sql_payAction_amount_text .= '    </div>';
        $sql_payAction_amount_text .= '</li>';



        if ($row_payAction_amount['payAction'] == 'cancel') {


            $payAction_cancel = round(abs($row_payAction_amount['action_month']), 0);

            $payAction_cancel_per = ($payAction_cancel / $all_take) * 100;
            

            $sql_payAction_amount_text .= '<li>';
            $sql_payAction_amount_text .= '    <div class="title">';
            $sql_payAction_amount_text .= '        <span class="title">전체 취소건 비율</span>';
            $sql_payAction_amount_text .= '    </div>';
            $sql_payAction_amount_text .= '    <div class="con">';
            $sql_payAction_amount_text .= '        <span class="data">'.round($payAction_cancel_per, 2).'</span>';
            $sql_payAction_amount_text .= '        <span class="won">%</span>';
            $sql_payAction_amount_text .= '    </div>';
            $sql_payAction_amount_text .= '</li>';
        }
    }
        
}


// SELECT payAction, SUM(amount) AS action_month
// FROM smallbee
// WHERE DATE_FORMAT(payDate, '%Y-%m') = '2023-06'
// GROUP BY payAction;


echo '<br>';


$month_amount_list_text = '';
$sql_month_amount_list = "SELECT MONTH(payDate) AS month_number, SUM(amount) AS data_count
FROM smallbee
GROUP BY month_number
ORDER BY data_count DESC
LIMIT 3;";

$result_month_amount_list = $conn->query($sql_month_amount_list);

if ($result_month_amount_list->num_rows > 0) {
    while ($row_month_amount_list = $result_month_amount_list->fetch_assoc()) {
        echo "<pre>";
        print_r($row_month_amount_list);
        echo "</pre>";
        

        $month_amount_list_text .= '<li>';
        $month_amount_list_text .= '    <div class="title">';
        $month_amount_list_text .= '        <span class="title">'.$row_month_amount_list['month_number'].'월</span>';
        $month_amount_list_text .= '    </div>';
        $month_amount_list_text .= '    <div class="con">';
        $month_amount_list_text .= '        <span class="data">'.$row_month_amount_list['data_count'].'</span>';
        $month_amount_list_text .= '        <span class="won">원</span>';
        $month_amount_list_text .= '    </div>';
        $month_amount_list_text .= '</li>';
    }
}






// Close connection
$conn->close();
?>

    
    
    

    
</head>
<body>
    <style>

        .box_wrap{
            margin: 25px 0;
        }
        .month_payMethod_prt{
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .month_payMethod_wrap{
            display: flex;
            flex-grow: 1;
            align-items: center;
            /* margin-right: calc(100vw - 30px - 390px); */
            padding: 7px 15px;
            border-top: 1px solid #ddd;
            background: #fafffe;
        }
        
        .month_payMethod_wrap.all_amount{
            /* margin-bottom: 20px; */
            /* border-bottom: 1px solid #ddd; */
            display: block;
        }

        .month_payMethod_wrap .title{
            display: block;
            min-width: 105px;
            font-size: 15px;
            font-weight: 600;
        }

        .month_payMethod_wrap .month_payMethod{
            width: 100%;
        }

        .month_payMethod_wrap .month_payMethod span{
            display: block; 
            padding: 7px;
            width: 100%;
            min-width: 100px;
        }

        .month_payMethod_wrap .month_payMethod > *:nth-child(n+2){
            border-top: 1px solid #e5e5e5;
        }

        .list_basic{
            display: flex;
            margin: 3px 0 10px;
        }

        .list_basic li:nth-child(n+2):before{
            content: ',';
            display: inline-block;
            margin-right: 3px;
        }

        .list_basic + .ctgry_count{
            display: block;
            margin-bottom: 25px;
        }



        .payType_requestType{
            margin: 10px 0;
        }

        .payType_requestType li{
            padding: 10px 0;
        }
    </style>
    <div class="wrap">
        <?php 
            echo $payVendor_ctgry;
            
            echo $payMethod_ctgry;
            
            echo $month_payMethod_text;

            echo $requestType_ctgry;

            echo $payType_ctgry;

            echo $payType_requestType_text;

            echo $payType_ctgry_rate_text;
        ?>
        
        <div class="payAction box_wrap">
            <h5 class="title">결제상태별 금액</h5>
            <ul class="action_list">
                <?php
                echo $sql_payAction_amount_text;
                ?>
            </ul>
        </div>

        <div class="amount_lank box_wrap">
            <h5 class="title">월별 매출 순위(내림차순)</h5>
            <ul class="action_list">
                <?php
                echo $month_amount_list_text;
                ?>
            </ul>
        </div>
    </div>
    






    
</body>
<script>

    
    $(function() {
        function calc_growth(prev = 0, now = 0) {
    
            let result = 0;
            if (prev === 0 && now === 0) {
                result = 0;
            }
    
            if (prev === 0 && now !== 0) {
                
                result = 100;
            }
    
            if (prev != 0 && now != 0) {
                result = ((now - prev) / prev) * 100;
            }

            if (result % 1 !== 0) {
                return result.toFixed(2);
            }
    
            return result;
        }


        $(".month_payMethod_prt").each(function() {
            
            $(this).children().each(function() {

                if ($(this).hasClass('all_amount') == 0) {

                    let this_type = $(this).attr('type');
                    let this_count = $(this).find('.month_payMethod .count').text().slice(0, -1);

                    let prev_count = $(this).parent().prev().children('[type=\''+this_type+'\']').find('.month_payMethod .count').text().slice(0, -1);

                    if ($(this).parent().prev().attr('class') != 'month_payMethod_prt') {
                        prev_count = '0';
                    }

                    // console.log(prev_count+' > '+this_count);

                    let num_prev_count = Number(prev_count);
                    let num_this_count = Number(this_count);

                    let value_growth = calc_growth(num_prev_count, num_this_count);

                    $(this).find('.month_payMethod .change').text(value_growth+'%');

                } else {
                    let this_amount = $(this).children('.month_payMethod').children('.amount').text().slice(0, -1);
                    let prev_amount = $(this).parent().prev().children('.all_amount').find('.amount').text().slice(0, -1);

                    if ($(this).parent().prev().attr('class') != 'month_payMethod_prt') {
                        prev_amount = '0';
                    }

                    let num_this_amount = Number(this_amount);
                    let num_prev_amount = Number(prev_amount);

                    let value_growth = calc_growth(num_prev_amount, num_this_amount);

                    $(this).find('.amount_change').text(value_growth+'%');
                    
                }


            });
            
        });

    });
</script>
</html>