// Đảm bảo jQuery đã được load trước khi chạy đoạn mã này
$(document).ready(function () {
    // Lắng nghe sự kiện khi giá trị của bộ lọc thay đổi
    $('#price-range, #category-select, #brand-select').on('input', function () {
        filterProducts();
    });

    // Khởi tạo sản phẩm ban đầu
    filterProducts();
});

function filterProducts() {
    // Lấy giá trị của các bộ lọc
    var minPrice = $('#price-range').val();
    var selectedCategory = $('#category-select').val();
    var selectedBrand = $('#brand-select').val();

    // Thực hiện lọc sản phẩm và hiển thị kết quả
    $.ajax({
        url: '{{ route("filter.products") }}', // Thay đổi đường dẫn tương ứng với route của bạn
        type: 'POST',
        data: {
            minPrice: minPrice,
            selectedCategory: selectedCategory,
            selectedBrand: selectedBrand
        },
        success: function (response) {
            // Hiển thị sản phẩm được lọc
            $('#product-list').html(response);
        }
    });
}
