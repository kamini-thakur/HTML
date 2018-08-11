
<!DOCTYPE html>
<html>
<head>
  <title>SHOPIFY APP</title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="/css/login-style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://sdks.shopifycdn.com/polaris/latest/polaris.css" />

    <link rel="stylesheet" href="https://sdks.shopifycdn.com/polaris/2.0.0-beta.12/polaris.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,700&subset=latin-ext" rel="stylesheet">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style type="text/css">
    #shopifyAPP{

      background:url('https://strategistmagazine.co/wp-content/uploads/2015/04/shopify-logo.jpg') no-repeat center fixed;
      background-size: cover;
    }

    </style>

    <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="//cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>

    <style>
    .notification-message {
 width:98%;
 margin:10px auto;
 background-color: #f2dede;
 border: 1px solid #ebccd1;
 color: #a94442;
 padding: 10px;
 font-size: 16px;
 border-radius: 4px;
 -webkit-border-radius: 4px;
 -ms-border-radius: 4px;
 -o-border-radius: 4px;
 -moz-border-radius: 4px;
}
.success {
    height: 10px;
    color: green;
    font-size: 18px;
    text-align: center;
}
.importProgress {
    height: 30px;
    color: green;
    font-size: 18px;
    text-align: center;
}
form.form-horizontal.exportData {
    margin: 50px auto;
}
input[type=button].btn-block, input[type=reset].btn-block, input[type=submit].btn-block {
    width: 100%;
    font-size: 21px;
}
.btn-block {
    display: block;
    width: 100%;
    font-size: 21px;
}
label.col-md-5.control-label {
    font-size: 16px;
    font-weight: bold;
    margin-left: 12px;
}
.popup-buy-now {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 1px 4px #fff;
  height: 250px;
  left: 0;
  margin: 0 auto;
  max-width: 420px;
  padding: 40px;
  position: fixed;
  right: 0;
  text-align: center;
  top: 20%;
  width: 100%;
  z-index: 99;
}
#popup_image_upload_close {
  background: transparent none repeat scroll 0 0;
  cursor: pointer;
  display: block;
  height: 20px;
  padding-right: 25px;
  position: absolute;
  right: -5px;
  top: -10px;
  width: 20px;
}
.popup-buy-now {
  text-align: center;
}
.popup-header {
  margin: 20px 0;
}
.popup-buy-now {
  text-align: center;
}
.fileinput-button {
  display: inline-block;
  overflow: hidden;
  position: relative;
}
#upload_image_button {
  color: #fff;
}
.fileinput-button input {
  cursor: pointer;
  direction: ltr;
  font-size: 200px;
  margin: 0;
  opacity: 0;
  position: absolute;
  right: 0;
  top: 0;
}
.progress1 {
  background: #ccc none repeat scroll 0 0;
  border-radius: 4px;
  display: block;
  height: 30px;
  margin-top: 20px;
  text-align: center;
  transition: width 0.3s ease 0s;
}
#progress #showProgress {
  height: 100%;
  width: 100%;
}
p {
  font-size: 16px;
  margin-bottom: 10px;
}
#upload_image_button {
  color: #fff;
}
p {
  margin: 0 0 10px;
}
.popup-buy-now {
  text-align: center;
}
#percentage-loader_1 {
  text-align: center;
}
.modal-header {
  border-bottom: 0 none;
  padding: 4px;
}
.modal-footer {
  padding: 9px;
  text-align: center;
  border-top: 0px;
}
.error {
  color: red;
}
.messages {
  height: 15px;
  margin-bottom: 0;
  margin-top: 10px;
  text-align: center;
}
  </style>
</head>

<body>

