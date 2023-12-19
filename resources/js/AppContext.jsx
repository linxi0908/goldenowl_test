import axios from "axios";
import { createContext, useEffect, useState } from "react";
export const AppContext = createContext({});
export const AppProvider = ({ children }) => {
    const [data, setData] = useState([]);
    const [cart, setCart] = useState([]);
    const [cartItems, setCartItems] = useState([]);
    const [addedToCart, setAddedToCart] = useState([]);
    const [isInitialMount, setIsInitialMount] = useState(true);

    //Product
    const fetchData = async () => {
        try {
            const response = await axios.get("/get_products");
            setData(response.data);
        } catch (error) {
            console.log(error);
        }
    };

    const handleAddToCart = (id, event) => {
        event.preventDefault();
        const item = data.find((item) => item.id === id);
        if (item && !isAddedToCart(id)) {
            const updatedItem = { ...item, addedToCart: true, qty: 1 };
            setCart((prevCart) => [...prevCart, updatedItem]);
            setAddedToCart((prevAddedToCart) => [...prevAddedToCart, id]);
        }
    };

    const isAddedToCart = (id) => {
        return addedToCart.includes(id);
    };

    // Cart

    const removeFromCart = (id) => {
        const updatedCart = cartItems.filter((item) => item.id !== id);
        setCart(updatedCart);
        localStorage.setItem("cart", JSON.stringify(updatedCart));
    };

    const changeQty = (id, num) => {
        const updatedCart = cartItems.map((item) => {
            if (item.id === id) {
                const updatedQty = item.qty + num;
                if (updatedQty < 1) {
                    const updatedCart = cartItems.filter(
                        (item) => item.id !== id
                    );
                    setCart(updatedCart);
                    localStorage.setItem("cart", JSON.stringify(updatedCart));
                }
                return { ...item, qty: updatedQty };
            }
            return item;

        });

        const filteredCart = updatedCart.filter((item) => item.qty >= 1);

        setCart(filteredCart);
        localStorage.setItem("cart", JSON.stringify(filteredCart));
    };

    const totalPrice = cartItems.reduce((accumulator, current) => {
        return accumulator + current.price * current.qty;
    }, 0);
    const calculateTotalPrice = () => {
        return cartItems.reduce((accumulator, current) => {
            return Number(
                (accumulator + current.price * current.qty).toFixed(2)
            );
        }, 0);
    };

    useEffect(() => {
        fetchData();
    }, []);

    useEffect(() => {
        localStorage.setItem("cart", JSON.stringify(cart));
    }, [cart]);

    useEffect(() => {
        const storedCart = JSON.parse(localStorage.getItem("cart"));
        setCartItems(storedCart);
    }, [cartItems, calculateTotalPrice]);

    return (
        <AppContext.Provider
            value={{
                cart,
                setCart,
                changeQty,
                removeFromCart,
                handleAddToCart,
                data,
                setData,
                addedToCart,
                setAddedToCart,
                isInitialMount,
                setIsInitialMount,
                cartItems,
                setCartItems,
                isAddedToCart,
                totalPrice,
                calculateTotalPrice,
            }}
        >
            {children}
        </AppContext.Provider>
    );
};
