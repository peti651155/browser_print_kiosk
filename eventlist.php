<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Termékek listája</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Termékek listája</h1>
		<table>
			<thead>
				<tr>
					<th>Név</th>
					<th>helyszín</th>
					<th>dátum</th>
					<th>ár</th>
					<th>Kosárba</th>
					<th>Törlés</th>
					<th>Kosárban (db)</th>
				</tr>
			</thead>
			<tbody>
				<?php
				session_start();
				$conn = mysqli_connect("localhost", "root", "", "szakdoga");
							if (!$conn) {
				die("Kapcsolódási hiba: " . mysqli_connect_error());
			}

			$sql = "SELECT * FROM events";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<tr>";
					echo "<td>" . $row["nev"] . "</td>";
					echo "<td>" . $row["helyszin"] . "</td>";
					echo "<td>" . $row["idopont"] . "</td>";
					echo "<td>" . $row["ar"] . " Ft" . "</td>";
					echo "<td><button onclick='addToCart(\"" . $row["id"] . "\", \"" . $row["nev"] . "\", \"" . $row["ar"] . "\", \"" . $row["ar"] . "\")'>+</button></td>";
					echo "<td><button onclick='removeFromCart(\"" . $row["id"] . "\", \"" . $row["nev"] . "\", \"" . $row["ar"] . "\", \"" . $row["ar"] . "\")'>-</button></td>";
					
						// Kosárban lévő mennyiség megjelenítése
						$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : array();
						$itemIndex = array_search($row['id'], array_column($cart, 'id'));
						$quantity = 0;
						if ($itemIndex !== false) {
							$quantity = $cart[$itemIndex]['quantity'];
						}
						
						echo "<td>" . $quantity . "</td>";
						

					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='5'>Nincs találat</td></tr>";
			}

			mysqli_close($conn);
			?>
		</tbody>
	</table>
</div>

<script>

function addToCart(id, name, datum, address, price) {
  var item = {
    id: id,
    name: name,
    address: address,
	datum: datum,
    price:price,
    quantity: 1
  };

  var cart = getCartFromCookie();
  var itemIndex = cart.findIndex(cartItem => cartItem.id === id);

  if (itemIndex !== -1) {
    cart[itemIndex].quantity++;
  } else {
    cart.push(item);
  }

  setCartToCookie(cart);
  updateCartInfo();
}

function removeFromCart(id) {
  var cart = getCartFromCookie();
  var itemIndex = cart.findIndex(cartItem => cartItem.id === id);

  if (itemIndex !== -1) {
    if (cart[itemIndex].quantity > 1) {
      cart[itemIndex].quantity--;
    } else {
      cart.splice(itemIndex, 1);
    }
  }

  setCartToCookie(cart);
  updateCartInfo();
}

function getCartFromCookie() {
  var cartCookie = document.cookie.match(/cart=([^;]+)/);
  return cartCookie ? JSON.parse(cartCookie[1]) : [];
}

function setCartToCookie(cart) {
  var cartJson = JSON.stringify(cart);
  document.cookie = "cart=" + cartJson + "; path=/";
}



</script>

<div class="container">
	
	<button onclick="clearCart()">Kosár kiürítése</button>
	<button onclick="window.location.href='kosar.php'">Tovább a kosárhoz</button>
	
	
</div>

<div id="cart-info">
  <p>Kosár: <span id="cart-items">0</span></p>
</div>
<script>
function clearCart() {
  document.cookie = "cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  updateCartInfo();
}

  function updateCartInfo() {
      var cart = getCartFromCookie();
    var cartItemsEl = document.getElementById("cart-items");
    cartItemsEl.innerHTML = "";
    for (var i = 0; i < cart.length; i++) {
      var item = cart[i];
      var li = document.createElement("li");
      li.textContent = item.name + " (" + item.quantity + " darab)";
      cartItemsEl.appendChild(li);
	  
    }
  }
  

  // frissítjük a kosár információkat minden termék hozzáadásakor vagy eltávolításakor
  window.addEventListener("storage", function(event) {
    if (event.key === "cart") {
      updateCartInfo();
    }
  });

  // oldal betöltésekor is frissítjük a kosár információkat
  updateCartInfo();
</script>

</body>
</html>





