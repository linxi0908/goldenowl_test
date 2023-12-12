import React from "react";
import { AppProvider } from './AppContext';
import Cart from "./components/Cart";
import Product from "./components/Product";
import ReactDOM from 'react-dom/client';


const root = ReactDOM.createRoot(document.getElementById('card-container'));
root.render(
    <React.StrictMode>
        <AppProvider>
       <Product />
     </AppProvider>
    </React.StrictMode>
);

const root1 = ReactDOM.createRoot(document.getElementById('card-cart'));
root1.render(
    <React.StrictMode>
        <AppProvider>
       <Cart />
     </AppProvider>
    </React.StrictMode>
);
