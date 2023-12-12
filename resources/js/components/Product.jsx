import React, {  useContext } from "react";
import { AppContext } from "../AppContext";


function Product() {
    const { data, handleAddToCart} = useContext(AppContext);

    return (
        <div>
            {data.map((item) => {
                return (
                    <div key={item.id} className="card-product">
                    <div
                        className="product-img"
                        style={{ background: item.color }}
                    >
                        <img src={item.image} alt={item.name} />
                    </div>
                    <div className="product-name">
                        <h4>{item.name}</h4>
                    </div>
                    <div className="product-description">
                        <p>{item.description}</p>
                    </div>
                    <div className="product-price">
                        <h4>$ {item.price}</h4>
                        <p>
                            <a
                                href="#"
                                className="add-to-cart"
                                onClick={(event) =>
                                    handleAddToCart(item.id, event)
                                }
                            >
                                add to cart
                            </a>
                        </p>
                    </div>
                </div>
                );
            }

            )}
        </div>
    );
}

export default Product;

