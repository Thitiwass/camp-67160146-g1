<!DOCTYPE html>
<html lang="th">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มใบสมัคร</title>
    <style>
        
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f0f8ff; 
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* คอนเทนเนอร์ฟอร์มหลัก */
        .form-container {
            width: 100%;
            max-width: 680px;
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0, 50, 100, 0.1); 
            border: 1px solid #e0e0e0;
        }

        /* หัวข้อ */
        h2 {
            text-align: center;
            color: #1e88e5; 
            margin-bottom: 30px;
            font-size: 2.5em;
            font-weight: 500;
        }

        /* Grid Layout */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 30px; 
            margin-bottom: 20px;
        }
        
        .full-width {
            grid-column: 1 / -1;
        }

        /* Label  */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #4a4a4a;
            font-size: 0.95em;
        }

        input[type="text"], 
        input[type="date"], 
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
            font-size: 1em;
            background-color: #fcfcfc;
        }

        input[type="text"]:focus, 
        input[type="date"]:focus, 
        textarea:focus {
            border-color: #1e88e5; 
            box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.2);
            outline: none;
            background-color: #ffffff;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* กลุ่ม Radio (เพศ) */
        .radio-group label {
            display: inline-block;
            margin-right: 20px;
            font-weight: normal;
        }

        /* Input File (รูปภาพ) */
        input[type="file"] {
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #f7f7f7;
        }

        /* Checkbox ยินยอม */
        .consent-group {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }
        .consent-group label {
            font-weight: 400;
            color: #333;
            display: inline-flex;
            align-items: center;
        }

        /* กลุ่มปุ่ม */
        .button-group {
            text-align: right;
            margin-top: 40px;
        }

        .button-group button {
            padding: 12px 30px;
            margin-left: 15px;
            border: none;
            border-radius: 50px; 
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        /* ปุ่มบันทึก */
        .button-group button[type="submit"] {
            background: linear-gradient(45deg, #1e88e5, #4fc3f7); 
            color: white;
            box-shadow: 0 4px 15px rgba(30, 136, 229, 0.4);
        }
        .button-group button[type="submit"]:hover {
            background: linear-gradient(45deg, #4fc3f7, #1e88e5);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(30, 136, 229, 0.6);
        }

        /* ปุ่ม Reset */
        .button-group button[type="reset"] {
            background-color: #f5f5f5; 
            color: #757575;
            border: 1px solid #ccc;
        }
        .button-group button[type="reset"]:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>แบบฟอร์มใบสมัคร</h2>
    <form action="#" method="post" enctype="multipart/form-data">

        <div class="form-grid">
            
            <div class="form-group">
                <label for="fname">ชื่อ:</label>
                <input type="text" id="fname" name="fname" required placeholder="ชื่อจริง">
            </div>

            <div class="form-group">
                <label for="lname">สกุล:</label>
                <input type="text" id="lname" name="lname" required placeholder="นามสกุล">
            </div>

            <div class="form-group">
                <label for="dob">วันเดือนปีเกิด:</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label>เพศ:</label>
                <div class="radio-group">
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male">ชาย</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">หญิง</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">อื่นๆ</label>
                </div>
            </div>
        </div>

        <div class="form-group full-width">
            <label for="photo">รูป (แนบไฟล์ภาพ):</label>
            <input type="file" id="photo" name="photo" accept="image/*">
        </div>
        
        <div class="form-group full-width">
            <label for="address">ที่อยู่:</label>
            <textarea id="address" name="address" rows="4" required placeholder="กรอกที่อยู่ปัจจุบันให้ละเอียด"></textarea>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="favorite_color">สีที่ชอบ:</label>
                <input type="text" id="favorite_color" name="favorite_color" placeholder="เช่น สีน้ำเงิน, สีเขียว">
            </div>

            <div class="form-group">
                <label for="favorite_music">แนวเพลงที่ชอบ:</label>
                <input type="text" id="favorite_music" name="favorite_music" placeholder="เช่น R&B, Classical">
            </div>
        </div>

        <div class="consent-group full-width">
            <input type="checkbox" id="agree" name="agree" value="yes" required>
            <label for="agree">ข้าพเจ้าได้อ่านและยอมรับข้อกำหนดและเงื่อนไขทั้งหมด</label>
        </div>

        <div class="button-group full-width">
            <button type="reset">Reset</button>
            <button type="submit">บันทึก</button>
        </div>

    </form>
</div>

</body>
</html>