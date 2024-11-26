fetch('http://localhost/btapl/api.php')
    .then(response => response.json())
    .then(data => {
        const productList = document.getElementById('product-list');
        data.forEach(product => {
            const li = document.createElement('li');
            li.textContent = `${product.name} - ${product.price} VNĐ`;
            productList.appendChild(li);
        });
    })
    .catch(error => console.error('Lỗi:', error));
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            // Gọi hàm thêm sản phẩm vào giỏ hàng
            addToCart(productId);
        });
    });
    
    function addToCart(productId) {
        // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
        fetch('add_to_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: productId })
        })
        .then(response => response.json())
        .then(data => {
            // Cập nhật giao diện người dùng hoặc thông báo cho người dùng
            alert('Sản phẩm đã được thêm vào giỏ hàng!');
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }