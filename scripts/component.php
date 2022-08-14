<?php

function component($productname, $productprice, $productimg, $productid, $productdesc){
    $element = "
    
    <div class=\"col-xl-3 col-md-6 col-12 my-3 my-md-0\" style=\"display: flex; justify-content: center; align-items: center;\">
                <form action=\"index.php\" method=\"post\">
               <div class=\"card bg-dark mb-3\" style=\"width: 18rem; color: white\">
          <img class=\"card-img-top\" src=\"$productimg\">
          <div class=\"card-body\">
            <h5 class=\"card-title\">$productname</h5>
            <p class=\"card-text\" style=\"color: gray\">$productdesc</p>
          </div>
          <ul class=\"list-group list-group-flush\">
                      <li class=\"list-group-item bg-dark\">
                        <h6>
                           <i class=\"fas fa-star\"></i>
                           <i class=\"fas fa-star\"></i>
                           <i class=\"fas fa-star\"></i>
                           <i class=\"fas fa-star\"></i>
                           <i class=\"far fa-star\"></i>
                        </h6>
                      </li>
            <li class=\"list-group-item bg-dark\" style=\"color: white\"><strong>Price</strong>: $$productprice</li>
          </ul>
          <div class=\"card-body\">
            <button type=\"submit\" class=\"btn btn-light my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
            <input type='hidden' name='product_id' value='$productid'>
          </div>
        </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"rounded\">
                        <div class=\"row bg-dark\">
                            <div class=\"col-md-3 pl-0\" style=\"padding: 0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\" style=\"color: #fff\">
                                <h5 class=\"pt-4 mt-5\">$productname</h5>
                                <h5 class=\"pt-2\">Price: $$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-light subbtn\">Dodać do ulubionych<ulubionych></ulubionych></button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2 subbtn\" name=\"remove\">Usunąć</button>
                            </div>
                            <div class=\"col-md-3 py-5 mt-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

















