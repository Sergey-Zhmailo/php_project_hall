// Ajax
// Add place to cart
function funcAddPlace(data) {
    let place_info = {};
    for (let prop in data) {
        place_info[prop] = data[prop];
    }
    let order = document.createElement("div");
    order.setAttribute("id", place_info.place_id);
    order.classList.add('cart-item', 'row', 'hoverable');
    order.innerHTML = `
<div class="col s4 item-price">
    <span>${place_info.category_price} грн.</span>
</div>
<div class="col s8">
    <span class="item-name">Место: ${place_info.place_name}</span>
    <span class="item-zone">Сектор: ${place_info.zone_name}</span>
</div>`;
    document.getElementById('cart-order').appendChild(order);
    cartAmount += +place_info.category_price;
    document.querySelector('#cart-amount').innerHTML = 'Сумма: ' + cartAmount + ' грн.';
}
// Remove place from cart
function funcRemovePlace(data) {
    document.getElementById(data['place_id']).remove();

    let place_info = {};
    for (let prop in data) {
        place_info[prop] = data[prop];
    }
    cartAmount -= +place_info.category_price;
    document.querySelector('#cart-amount').innerHTML = 'Сумма: ' + cartAmount + ' грн.';
}

let places = document.getElementsByClassName('place-checkbox');
let placesCount = 0;
let cartAmount = 0;

for (let i = 0; i <= places.length - 1; i++) {
    places[i].onchange = function () {
        if (places[i].checked) {
            console.log('check');
            $.ajax({
                url: '/ajax.php',
                type: 'post',
                data: 'place_id='+places[i].dataset.placeId,
                dataType: 'json',
                success: funcAddPlace
            });
            ++placesCount;
            document.querySelector('#cart-quantity').innerHTML = 'Выбрано билетов: ' + placesCount;
        } else {
            console.log('clear');
            $.ajax({
                url: '/ajax.php',
                type: 'post',
                data: 'place_id='+places[i].dataset.placeId,
                dataType: 'json',
                success: funcRemovePlace
            });
            --placesCount;
            document.querySelector('#cart-quantity').innerHTML = 'Выбрано билетов: ' + placesCount;
        }
    };
}
// Toast massage
function toast() {
    setTimeout(function () {
        document.querySelector('.errors-wrapper').remove();
    }, 3000);
}
document.addEventListener("DOMContentLoaded", toast);

