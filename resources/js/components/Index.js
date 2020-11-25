import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios'
import Cart from "./Cart"
import ResultModal from "./ResultModal"
import CategoriesList from "./CategoriesList"
import ProductCatalog from "./ProductCatalog"
import { filter } from 'lodash';

function Main(props) {

    //const {  } = props
    const authenticated = (props.authenticated == "true") ? true : false

    const [products, setProducts] = React.useState([])
    const [cart, setCart] = React.useState(null)
    const [productAddingToCart, setProductAddingToCart] = React.useState(null)
    const [categories, setCategories] = React.useState([])
    const [filteredCategories, setFilteredCategories] = React.useState([])

    const addProductToCart = (product) => {
        if(authenticated) {
            setProductAddingToCart(product.id)
            axios.post("carritos/agregar_producto/"+product.id).then(response => {
                setProductAddingToCart(null)
                setCart(response.data)
            })
        } else
            window.location.href = 'login';
    }

    const removeProductFromCart = (productId) => {
        axios.delete("carritos/quitar_producto/"+productId).then(response => {
            setCart(response.data)
        })
    }

    const confirmCart = () => {
        axios.post("carritos/confirmar").then(response => {
            setCart(null)
            $('#resultModal').modal('toggle') // llamada a método de jquery
        })
    }

    const discardCart = () => {
        axios.delete("carritos/descartar").then(response => {
            setCart(null)
        })
    }

    React.useEffect(() => {
        axios.get("/productos").then(response => { console.log(response.data); setProducts(response.data)} )
        axios.get("/categorias").then(response => {console.log(response.data);setCategories(response.data)} )
        if(authenticated) {
            axios.get("carritos/obtener_actual").then(response => {
                console.log(response.data)
                setCart(response.data)
            })
        }
    }, [])


    return (
        <div className="container">
            <ResultModal />
            <Cart 
                cartData={cart} 
                onProductRemoveClick={removeProductFromCart}
                onCartConfirmClick={confirmCart}
                onCartDiscardClick={discardCart}
            />
            <div className="row">
                <div className="col-md-4">
                    <CategoriesList 
                        categories={categories} 
                        filteredCategories={filteredCategories}
                        onFilteredCategoriesChange={setFilteredCategories}
                    />
                </div>
                <div className="col-md-8">
                    <ProductCatalog 
                        products={products}
                        filteredCategories={filteredCategories}
                        onAddToCartClick={addProductToCart}
                        productAddingToCart={productAddingToCart} 
                    />
                </div>
            </div>
        </div>
    );
}

export default Main;

if (document.getElementById('content')) {
    const component = document.getElementById('content')
    const props = Object.assign({}, component.dataset)
    ReactDOM.render(<Main {...props} />, component);
}
