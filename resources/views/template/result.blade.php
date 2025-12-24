<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>ผลการสมัคร Workshop</title>

<style>
body {
    font-family: sans-serif;
    background: #eef4fb;
}

.box {
    width: 500px;
    margin: 40px auto;
    background: #ffffff;
    padding: 25px;
    border-radius: 10px;
}

p {
    margin: 8px 0;
}
</style>
</head>

<body>

<div class="box">
    <h3>ข้อมูลที่ส่งมา</h3>

    <p><b>ชื่อ-สกุล:</b> {{ $fname }} {{ $lname }}</p>
    <p><b>วันเกิด:</b> {{ $birthdate }}</p>
    <p><b>อายุ:</b> {{ $age }}</p>
    <p><b>เพศ:</b> {{ $gender }}</p>
    <p><b>ที่อยู่:</b> {{ $address }}</p>
    <p><b>สีที่ชอบ:</b> {{ $color }}</p>
    <p><b>แนวเพลงที่ชอบ:</b> {{ $music }}</p>

    <br>
    <a href="/">← กลับหน้าฟอร์ม</a>
</div>

</body>
</html>
