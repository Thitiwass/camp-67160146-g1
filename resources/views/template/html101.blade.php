<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>แบบฟอร์มสมัคร Workshop</title>

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
    box-shadow: 0 0 8px rgba(0,0,0,0.15);
}

label {
    display: block;
    margin-top: 12px;
    font-weight: bold;
}

input[type="text"],
input[type="number"],
input[type="date"],
textarea {
    width: 100%;
    padding: 6px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
}

/* เพศเรียงแนวนอน */
.gender {
    display: flex;
    gap: 20px;
    margin-top: 6px;
}

.gender label {
    font-weight: normal;
}

.btn {
    margin-top: 20px;
    text-align: right;
}

button {
    padding: 6px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.reset {
    background: #999;
    color: #fff;
}

.submit {
    background: #1e88e5;
    color: #fff;
}
</style>
</head>

<body>

<div class="box">
    <h3>แบบฟอร์มสมัคร Workshop</h3>

    <form method="POST" action="/submit" enctype="multipart/form-data">
        @csrf

        <label>ชื่อ</label>
        <input type="text" name="fname" required>

        <label>สกุล</label>
        <input type="text" name="lname" required>

        <label>วันเดือนปีเกิด</label>
        <input type="date" name="birthdate" required>

        <label>อายุ</label>
        <input type="number" name="age" required>

        <label>เพศ</label>
        <div class="gender">
            <label><input type="radio" name="gender" value="ชาย" required> ชาย</label>
            <label><input type="radio" name="gender" value="หญิง"> หญิง</label>
            <label><input type="radio" name="gender" value="อื่นๆ"> อื่นๆ</label>
        </div>

        <!-- ✅ มีช่องอัปโหลดรูป แต่ไม่เอาไปใช้ต่อ -->
        <label>รูปภาพ</label>
        <input type="file" name="photo" required>

        <label>ที่อยู่</label>
        <textarea name="address" rows="3" required></textarea>

        <label>สีที่ชอบ</label>
        <input type="text" name="color" required>

        <label>แนวเพลงที่ชอบ</label>
        <input type="text" name="music" required>

        <label style="margin-top:12px;">
            <input type="checkbox" name="agree" required>
            ยินยอมตามเงื่อนไข
        </label>

        <div class="btn">
            <button type="reset" class="reset">Reset</button>
            <button type="submit" class="submit">Submit</button>
        </div>
    </form>
</div>

</body>
</html>
