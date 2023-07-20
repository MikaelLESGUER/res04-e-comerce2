// ce js est destiné à la route order-products
// il faudra probablement vérifier dans le js que l'on est bien sur la bonne page
// avant d'essayer de récupérer des éléments du DOM sur la mauvaise page

let products
let productsButtons;
let cart;

function populateCart(productsInCart) {
    cart.innerHTML = '';
    productsInCart.forEach(product => {
        const li = document.createElement('li');
        li.innerText = product.name;
        cart.appendChild(li);
        const hiddenFormValue = document.createElement('input');
        // met chaque product_id dans le meme tableau itérable coté back dans $_POST['products_ids']
        hiddenFormValue.setAttribute('type', 'hidden');
        hiddenFormValue.setAttribute('name', 'products_ids[]');
        hiddenFormValue.setAttribute('value', product.id);
        cart.appendChild(hiddenFormValue);
    });
}



window.addEventListener('DOMContentLoaded', () => {
    products = document.getElementById('products');
    productsButtons = products.querySelectorAll('input[type="submit"]');
    cart = document.getElementById('cart');
    let productsInCart = [];
    const createOrderForm = document.querySelector('form#order-create');

    productsButtons.forEach(productCheck => {
        if (!productCheck.classList.contains("noJS")) {
            productCheck.addEventListener('click', (e) => {

                const product = {
                    name: e.target.getAttribute('name'),
                    id: e.target.getAttribute('id')
                };
                productsInCart.push(product);
                populateCart(productsInCart);

            })
        }

    })

})
