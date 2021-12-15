if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded' , ready)
} else {
    ready()
    
}
function removeCartItem(event){
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.parentElement.parentElement.remove()
    updateCartTotal()
}

function ready(){
    var removeCartItemButtons = document.getElementsByClassName('btn-Remove')
    
for (var i = 0; i <removeCartItemButtons.length; i++)
{
    var button  = removeCartItemButtons[i]
    button.addEventListener('click', removeCartItem)
}
     var QuantityInputs = document.getElementsByClassName("cart-quantity")
   for (var i = 0; i <QuantityInputs.length; i++){
        var input = QuantityInputs[i]
        input.addEventListener('change' , quantityChanged )
   }
   var addToCartButtons = document.getElementsByClassName('bttn cart')
   for (var i = 0; i <addToCartButtons.length; i++){
    var button = addToCartButtons[i]
    button.addEventListener('click', addToCartClicked)

   }
}
function addToCartClicked(event){
    var button = event.target
    var ShopItem = button.parentElement.parentElement
    var title = ShopItem.getElementsByClassName('shop-item-title')[0].innerText
    console.log(title)
}
function quantityChanged(event){
    var input = event.target
    if(isNaN(input.value) || (input.value ) <=1)
    {
        input.value = 1
    }
     updateCartTotal()

     
}


function updateCartTotal(){
    var cartItemContainer = document.getElementsByClassName('small-container cart-page')[0]
    var cartRows = cartItemContainer.getElementsByClassName('Table-row')
    var total = 0
    for (var i = 0; i < cartRows.length  ; i++){
        
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity')[0]
        var quantity = quantityElement.value
        var price = parseFloat(priceElement.innerText.replace('€' , ''))
        total = total + (price * quantity)
        
    }
    total = Math.round(total * 100) / 100 
    document.getElementsByClassName('cart-total-price')[0].innerText = '€' + total

}



