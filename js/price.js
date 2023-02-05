function updatePrice() {
    var price = (parseFloat(document.getElementById("weight").value));
    document.getElementById("price").innerHTML="<p>PRICE: " + price.toFixed(2) + "INR</p>";
}