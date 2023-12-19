import React, { useContext } from "react";
import { AppContext } from "../AppContext";

function TotalPrice() {
    const { cartItems, calculateTotalPrice} = useContext(AppContext);

    return (
        <div>
            {cartItems.length > 0 ? (
                <h3>$ {calculateTotalPrice()}</h3>
            ) : (
                <h3>$ 0.00</h3>
            )}
        </div>
    );
}

export default TotalPrice;
