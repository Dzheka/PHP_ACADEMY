'use strict';

const searchEl = document.getElementById('searchInput');
const categoryEl = document.getElementById('category');
const containerEl = document.getElementById('container');

searchEl.addEventListener('input', showProduct);
categoryEl.addEventListener('input', showProduct);

function showProduct(evt) {
    const {name, value} = evt.target;

    let apiUrl = name === 'category' ? "../views/categories.php?category=" + value : "../views/categories.php?search=" + value;

    fetch(apiUrl)
        .then(response => response.text())
        .then(products => containerEl.innerHTML = products);
}

const formEl = document.getElementById('searchBar');
formEl.onsubmit = (evt) => {
    evt.preventDefault();
}