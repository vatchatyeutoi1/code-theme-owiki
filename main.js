jQuery(document).ready(function($) {
    $('#advanced-searchform').submit(function(event) {
        event.preventDefault(); // Ngăn chặn form gửi thông thường
        var formData = $(this).serialize(); // Lấy dữ liệu từ form

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>', // URL để gửi yêu cầu AJAX
            type: 'GET',
            data: formData + '&action=advanced_search', // Thêm hành động vào dữ liệu gửi
            success: function(response) {
                $('.advanced-search-result').html(response); // Hiển thị kết quả tìm kiếm
            },
            error: function(xhr, status, error) {
                $('.advanced-search-result').html('<p>Đã xảy ra lỗi. Vui lòng thử lại.</p>'); // Hiển thị thông báo lỗi
            }
        });
    });

    // Mã hiện tại để xử lý thay đổi danh mục và nút clear
    $('#category-dropdown').change(function() {
        var selectedCategory = $(this).val();
        var selectedCategoryName = $('#category-dropdown option:selected').text().trim();
        var currentText = $('#selected-categories').val();
        if (selectedCategory !== '0' && selectedCategoryName !== '') {
            if (currentText !== '') {
                currentText += ', ';
            }
            currentText += selectedCategoryName;
            $('#selected-categories').val(currentText);
        }
    });
    $('#clear-categories').click(function() {
        $('#selected-categories').val('');
    });
});
