// Confirm product deletion (if you add delete functionality later)
function confirmDelete() {
    return confirm("Are you sure you want to delete this product?");
}


// Smooth scroll for navbar links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth"
        });
    });
});

// Toast message for "Add to Cart"
const cartButtons = document.querySelectorAll('.btn-success');
cartButtons.forEach(button => {
    button.addEventListener('click', () => {
        alert("Product added to cart!");
    });
});
