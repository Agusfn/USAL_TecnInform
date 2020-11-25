import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios'
import ProductBox from "./ProductBox"
import Cart from "./Cart"
import ResultModal from "./ResultModal"

function Main(props) {

    //const {  } = props
    const authenticated = (props.authenticated == "true") ? true : false

    const [products, setProducts] = React.useState([])
    const [cart, setCart] = React.useState(null)
    const [productAddingToCart, setProductAddingToCart] = React.useState(null)

    const addProductToCart = (product) => {
        if(authenticated) {
            setProductAddingToCart(product.id)
            axios.post("carritos/agregar_producto/"+product.id).then(response => {
                setProductAddingToCart(null)
                console.log("add to cart response: ", response.data)
                setCart(response.data)
            })
        } else
            window.location.href = 'login';
    }

    const removeProductFromCart = (productId) => {
        console.log("Removing product", productId)
        axios.delete("carritos/quitar_producto/"+productId).then(response => {
            console.log("remove from cart response: ", response.data)
            setCart(response.data)
        })
    }

    const confirmCart = () => {
        axios.post("carritos/confirmar").then(response => {
            setCart(null)
            $('#resultModal').modal('toggle') // llamada a método de jquery
            console.log(response)
        })
    }

    const discardCart = () => {
        axios.delete("carritos/descartar").then(response => {
            setCart(null)
            console.log(response)
        })
    }

    React.useEffect(() => {
        axios.get("/productos").then(response => {
            setProducts(response.data)
        })
        if(authenticated) {
            axios.get("carritos/obtener_actual").then(response => {
                console.log(response.data)
                setCart(response.data)
            })
        }
    }, [])

    const productItems = products.map(product => 
        <ProductBox 
            key={product.id} 
            product={product} 
            onAddToCartClick={() => addProductToCart(product)}
            addingToCart={productAddingToCart == product.id}
        />
    )

    return (
        <div className="container">

            <ResultModal />

            <Cart 
                cartData={cart} 
                onProductRemoveClick={removeProductFromCart}
                onCartConfirmClick={confirmCart}
                onCartDiscardClick={discardCart}
            />

            <div className="card">
                <div className="card-body">
                    {productItems}
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
