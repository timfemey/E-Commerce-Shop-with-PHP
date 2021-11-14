<?php

function component($name,$price,$productImg,$id){
    $res="
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                    <form action=\"index.php\" method=\"POST\">
                        <div class=\"card\" >
                            <img src=\"$productImg\" alt=\"Tesla Car\" class=\"img-fluid card-img-top\"/>
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$name</h5>
                            <p class=\"card-text\">The Tesla $name</p>

                            <h6><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i></h6>
                            <h5><span class=\"price\">$$price</span></h5>
                            <button type=\"submit\" name=\"add\" class=\"btn btn-primary\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                            <input type=\"hidden\" name=\"id\" value=\"$id\"/>
                        </div>
                    </form>
                    <br/>
                    <br/>
    </div>
   
    ";

   return $res;

     
}

function cartElement($img,$name, $price,$id){
    $res="
        <form action=\"cart.php?action=remove&id=$id\" method=\"POST\" class=\"cart-items\">
                           <div class=\"border rounded\">
                               <div class=\"row bg-light\">
                                    <div class=\"col-md-3 pl-0\">
                                   <img src=\"$img\" alt=\"Image\" class=\"img-fluid\">
                               </div>
                               <div class=\"col-md-6\">
                                   <h3 class=\"pt-2\">$name</h3>
                                   <small class=\"text-secondary\">Seller: Obafemi</small>
                                   <h5 class=\"pt-2\">$ $price</h5>
                                   <button type=\"submit\" name=\"save\" class=\"btn btn-warning\">Save For Later</button>
                                   <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                               </div>
                            </div>                              
                               
                           </div>
        </form>
    ";

    echo $res;

}

?>