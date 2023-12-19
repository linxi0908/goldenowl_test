import React, {  useContext, useDebugValue, useEffect } from "react";
import { AppContext } from "../AppContext";

function Cart() {
    const {cartItems, removeFromCart, changeQty } = useContext(AppContext);
    useEffect(() => {

      }, [cartItems]);
    return (
        <div>
            {cartItems.length > 0 ? (
                <div>
                    {cartItems.map((item, index) => {
                        return (
                            <div className="cart" key={index}>
                                <div className="cart-left">
                                    <div
                                        className="cart-img"
                                        style={{ background: item.color }}
                                    >
                                        <img
                                            src={item.image}
                                            alt={item.name}
                                        ></img>
                                    </div>
                                </div>
                                <div className="cart-right">
                                    <div className="cartIItemName">
                                        <h5>{item.name}</h5>
                                    </div>
                                    <div className="cartItemPrice">
                                        <h4>$ {item.price}</h4>
                                    </div>
                                    <div className="cartItemAction">
                                        <div className="cartItemCount">
                                            <div
                                                className="cartItemCountMinus"
                                                onClick={() =>
                                                    changeQty(item.id, -1)
                                                }
                                            >
                                                <img
                                                    src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/minus.png"
                                                    alt=""
                                                ></img>
                                            </div>
                                            <div className="cartItemCountNumber">
                                                <input
                                                    type="text"
                                                    value={item.qty}
                                                    name="qtybutton"
                                                    className="cart-plus-minus-box"
                                                    disabled
                                                ></input>
                                            </div>
                                            <div
                                                className="cartItemCountPlus"
                                                onClick={() =>
                                                    changeQty(item.id, 1)
                                                }
                                            >
                                                <img
                                                    src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/plus.png"
                                                    alt=""
                                                ></img>
                                            </div>
                                        </div>
                                        <div
                                            className="cartItemRemove"
                                            onClick={() =>
                                                removeFromCart(item.id)
                                            }
                                        >
                                            <img
                                                src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/trash.png"
                                                alt=""
                                            ></img>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        );
                    })}
                </div>
            ) : (
                <p>Your cart is empty.</p>
            )}
        </div>
    );
}

export default Cart;
