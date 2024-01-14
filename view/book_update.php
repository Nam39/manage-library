<?php
include '../view/header.php';
echo '<style>';
include '../view/style1.css'; // Include nội dung của file CSS
echo '</style>';
?>
<div class="container p-5">
    <div class="text-center">
        <h4>
            SỬA THÔNG TIN SÁCH
        </h4>
    </div>

    <div class="validate">
    </div>
    <form id="updateForm" action="book_update_confirm.php" method="post" enctype="multipart/form-data">
        <?php
        $id = $_GET['id'];
        echo "<input type='text' name='id' id='id' class='d-none' value='$id'>";
        ?>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Tên sách<span class="require">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="category" class="col-sm-2 col-form-label ">Thể loại<span class="require">*</span></label>
            <div class="col-sm-5">
                <select name="category" class="form-select" id="category">

                    <?php
                    $category_arr = array("Science" => "Khoa học ", "Novel" => "Tiểu thuyết", "Manga" => "Manga", "SGK" => "Sách giáo khoa");
                    foreach ($category_arr as $key => $value) {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="author" class="col-sm-2 col-form-label">Tác giả<span class="require">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" style="width: 48%" id="author" name="author">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="quantity" class="col-sm-2 col-form-label">Số lượng<span class="require">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" style="width: 25%" id="quantity" name="quantity">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label" style="height: 40%;">Mô tả<span class="require">*</span></label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label" for="avatar" style="height: 20%;">Hình ảnh<span class="require">*</span></label>
            <div class="col-sm-10">
                <div class='col-sm-5'>
                    <img src='' id="img_upload" alt='Uploaded Image' class='img-fluid'>
                    <input type='text' name='img_path' id='img_path' class='d-none'>
                </div>
                <input id="avatar" type="file" name="avatar" class="form-control" onchange='loadFile(event)'>
            </div>
        </div>

    </form>
    <div class="text-center">
        <button type="submit" name ="confirm" class="btn btn-success mb-3 pe-5 ps-5">Xác nhận</button>
    </div>
</div>

<script src="../booklist_handle.js"></script>
<script>
    function validateImage(field, message) {
        // Kiểm tra xem trường ảnh có giá trị không
        if (!field || field.length === 0)  {
            return message + "<br>";
        }

        // Kiểm tra định dạng của ảnh (đuôi file)
        const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(field)) {
            return `${message} Hãy chọn file hình ảnh có định dạng hợp lệ (jpg, jpeg, png, gif).<br>`;
        }

        // Nếu không có lỗi, trả về chuỗi rỗng
        return "";
    }


    function validateField(field, message, maxLength) {
        if (!field) {
            return message + "<br>";
        }

        if (maxLength !== undefined && field.length > maxLength) {
            if (message.endsWith(".") && message != "Hãy nhập số lượng.") {
                message = message.slice(0, -1);
                return `${message} không được quá ${maxLength} ký tự.<br>`;
            } else {
                message = message.slice(0, -1);
                return `${message} không được quá ${maxLength} chữ số.<br>`;
            }
        }

        return '';
    }


    $(document).ready(function() {
        displayEditItem($("#id").val());
        $('[type="submit"]').on('click', () => {
            let validateMessage = '';

            const name = $('#name').val();
            const category = $('#category').val();
            const author = $('#author').val();
            const quantity = $('#quantity').val();
            const description = $('#description').val();
            const image = $('#avatar').val();

            validateMessage += validateField(name, 'Hãy nhập tên sách.', 100);
            validateMessage += validateField(category, 'Hãy chọn thể loại.');
            validateMessage += validateField(author, 'Hãy nhập tên tác giả.', 250);
            validateMessage += validateField(quantity, 'Hãy nhập số lượng.', 2);
            validateMessage += validateField(description, 'Hãy nhập mô tả.', 1000);
            // validateMessage += validateImage(image, 'Hãy tải ảnh lên.');

            $('.validate').html(validateMessage);
            if (validateMessage == "") {
                $('form').submit();
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        displayEditItem($("#id").val());
    });

    var loadFile = function(event) {
        var output = document.getElementById('img_upload');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>

</html>