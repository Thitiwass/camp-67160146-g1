<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มใบสมัคร</title>
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f7f6; padding: 20px; display: flex; justify-content: center; }
        .container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 100%; max-width: 600px; }
        
        /* จัดคำว่าแบบฟอร์มอยู่ตรงกลาง */
        h2 { text-align: center; color: #333; margin-bottom: 25px; }
        
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="date"], textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .error-msg { color: red; font-size: 13px; margin-top: 5px; display: block; }
        
        /* สไตล์กลุ่มปุ่ม */
        .button-group { display: flex; gap: 10px; margin-top: 20px; }
        .btn-submit { background-color: #007bff; color: white; border: none; padding: 12px; border-radius: 4px; cursor: pointer; flex: 2; font-size: 16px; font-weight: bold; }
        .btn-reset { background-color: #6c757d; color: white; border: none; padding: 12px; border-radius: 4px; cursor: pointer; flex: 1; font-size: 16px; }
        
        #resultCard { display: none; border-top: 2px solid #28a745; margin-top: 20px; padding-top: 20px; }
        .profile-preview { width: 150px; height: 150px; object-fit: cover; border-radius: 8px; border: 2px solid #ddd; }
        .name-grid { display: flex; gap: 10px; }
    </style>
</head>
<body>

<div class="container">
    <div id="formSection">
        <h2>แบบฟอร์มใบสมัคร</h2>
        <form id="applyForm" onsubmit="return false;">
            <div class="name-grid">
                <div class="form-group" style="flex: 1;">
                    <label>ชื่อ:</label>
                    <input type="text" id="fname" placeholder="กรอกชื่อ">
                    <span id="err_fname" class="error-msg"></span>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>นามสกุล:</label>
                    <input type="text" id="lname" placeholder="กรอกนามสกุล">
                    <span id="err_lname" class="error-msg"></span>
                </div>
            </div>

            <div class="form-group">
                <label>วันเดือนปีเกิด:</label>
                <input type="date" id="dob">
                <span id="err_dob" class="error-msg"></span>
            </div>

            <div class="form-group">
                <label>เพศ:</label>
                <input type="radio" name="gender" value="ชาย" id="male"> <label style="display:inline; font-weight: normal; margin-right: 15px;" for="male">ชาย</label>
                <input type="radio" name="gender" value="หญิง" id="female"> <label style="display:inline; font-weight: normal;" for="female">หญิง</label>
                <span id="err_gender" class="error-msg"></span>
            </div>

            <div class="form-group">
                <label>รูปถ่าย:</label>
                <input type="file" id="photo" accept="image/*">
                <span id="err_photo" class="error-msg"></span>
            </div>

            <div class="form-group">
                <label>ที่อยู่:</label>
                <textarea id="address" rows="3" placeholder="กรอกที่อยู่ปัจจุบัน"></textarea>
                <span id="err_address" class="error-msg"></span>
            </div>

            <div class="name-grid">
                <div class="form-group" style="flex: 1;">
                    <label>สีที่ชอบ:</label>
                    <input type="text" id="color" placeholder="เช่น สีแดง">
                    <span id="err_color" class="error-msg"></span>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>แนวเพลงที่ชอบ:</label>
                    <input type="text" id="music" placeholder="เช่น Pop, Rock">
                    <span id="err_music" class="error-msg"></span>
                </div>
            </div>

            <div class="form-group">
                <input type="checkbox" id="agree"> ยินยอมให้เก็บข้อมูล
                <span id="err_agree" class="error-msg"></span>
            </div>

            <div class="button-group">
                <button type="reset" class="btn-reset" onclick="clearErrors()">รีเซ็ต</button>
                <button type="button" class="btn-submit" onclick="validateForm()">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>

    <div id="resultCard">
        <h3 style="color: #28a745; text-align: center;">ตรวจสอบข้อมูลสำเร็จ (Pass)</h3>
        <div style="text-align: center; margin-bottom: 15px;">
            <img id="res_img" class="profile-preview">
        </div>
        <p><strong>ชื่อ-นามสกุล:</strong> <span id="res_fullname"></span></p>
        <p><strong>วันเกิด:</strong> <span id="res_dob"></span></p>
        <p><strong>ที่อยู่:</strong> <span id="res_address"></span></p>
        <p><strong>สิ่งที่ชอบ:</strong> สี<span id="res_color"></span>, แนวเพลง<span id="res_music"></span></p>
        <button onclick="window.location.reload()" style="background: #6c757d; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100%; margin-top: 10px;">กลับไปหน้าฟอร์ม</button>
    </div>
</div>

<script>
    // ฟังก์ชันล้างข้อความ Error เมื่อกดรีเซ็ต
    function clearErrors() {
        document.querySelectorAll('.error-msg').forEach(el => el.innerText = "");
    }

    function validateForm() {
        clearErrors();
        
        let isValid = true;
        const fname = document.getElementById('fname').value;
        const lname = document.getElementById('lname').value;
        const dob = document.getElementById('dob').value;
        const photo = document.getElementById('photo').files;
        const address = document.getElementById('address').value;
        const color = document.getElementById('color').value;
        const music = document.getElementById('music').value;
        const gender = document.querySelector('input[name="gender"]:checked');
        const agree = document.getElementById('agree').checked;

        if (!fname.trim()) { document.getElementById('err_fname').innerText = "กรุณากรอกชื่อ"; isValid = false; }
        if (!lname.trim()) { document.getElementById('err_lname').innerText = "กรุณากรอกนามสกุล"; isValid = false; }
        if (!dob) { document.getElementById('err_dob').innerText = "ระบุวันเกิด"; isValid = false; }
        if (!gender) { document.getElementById('err_gender').innerText = "เลือกเพศ"; isValid = false; }
        if (photo.length === 0) { document.getElementById('err_photo').innerText = "แนบรูปภาพ"; isValid = false; }
        if (!address.trim()) { document.getElementById('err_address').innerText = "กรอกที่อยู่"; isValid = false; }
        if (!color.trim()) { document.getElementById('err_color').innerText = "ระบุสีที่ชอบ"; isValid = false; }
        if (!music.trim()) { document.getElementById('err_music').innerText = "ระบุแนวเพลง"; isValid = false; }
        if (!agree) { document.getElementById('err_agree').innerText = "กรุณากดยินยอม"; isValid = false; }

        if (isValid) {
            document.getElementById('formSection').style.display = "none";
            document.getElementById('resultCard').style.display = "block";
            document.getElementById('res_fullname').innerText = fname + " " + lname;
            document.getElementById('res_dob').innerText = dob;
            document.getElementById('res_address').innerText = address;
            document.getElementById('res_color').innerText = color;
            document.getElementById('res_music').innerText = music;
            
            const reader = new FileReader();
            reader.onload = function(e) { document.getElementById('res_img').src = e.target.result; }
            reader.readAsDataURL(photo[0]);
        }
    }
</script>
</body>
</html>