import axios from "axios";
import { createContext, useEffect, useState } from "react";
export const AppContext = createContext({});
export const AppProvider = ({ children }) => {
    //Product
    const [data, setData] = useState([]);
    const [cart, setCart] = useState([]);
    const [addedToCart, setAddedToCart] = useState([]);
    const [isInitialMount, setIsInitialMount] = useState(true);

    const fetchData = async () => {
        try {
            const response = await axios.get("/get_products");
            setData(response.data);
        } catch (error) {
            console.log(error);
        }
    };

    // const handleAddToCart = (id, event) => {
    //     event.preventDefault();
    //     const item = data.find((item) => item.id === id);
    //     if (item && !item.addedToCart) {
    //         const updatedItem = { ...item, addedToCart: true, qty: 1 };
    //         setCart((prevCart) => [...prevCart, updatedItem]);
    //         setData((prevData) =>
    //             prevData.map((item) => (item.id === id ? updatedItem : item))
    //         );
    //         setAddedToCart((prevAddedToCart) => [...prevAddedToCart, id]);
    //     }
    // };

    const handleAddToCart = (id, event) => {
        event.preventDefault();
        const item = data.find((item) => item.id === id);
        if (item && !item.addedToCart) {
          const updatedItem = { ...item, addedToCart: true, qty: 1 };
          setCart((prevCart) => [...prevCart, updatedItem]);
          setAddedToCart((prevAddedToCart) => [...prevAddedToCart, updatedItem]);
        }
      };

    const isAddedToCart = (id) => {
        return addedToCart.includes(id);
    };

    //Cart

    const removeFromCart = (id) => {
        const updatedCart = cart.filter((item) => item.id !== id);
        setCart(updatedCart);
        localStorage.setItem("cart", JSON.stringify(updatedCart));
    };

    const changeQty = (id, num) => {
        const updatedCart = cart.map((item) => {
            if (item.id === id) {
                const updatedQty = item.qty + num;
                if (updatedQty < 1) {
                    const updatedCart = cart.filter((item) => item.id !== id);
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

    useEffect(() => {
        fetchData();
        const savedCart = JSON.parse(localStorage.getItem("cart"));
        if (savedCart) {
            setCart(savedCart);
        }
    }, []);

    useEffect(() => {
        if (isInitialMount) {
            setIsInitialMount(false);
        } else {
            localStorage.setItem("cart", JSON.stringify(cart));
        }
    }, [cart, isInitialMount, setCart]);

    useEffect(() => {
    }, [cart]);

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
                isAddedToCart,
            }}
        >
            {children}
        </AppContext.Provider>
    );
};
