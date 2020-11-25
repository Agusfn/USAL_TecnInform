import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios'
import ProductBox from "./ProductBox"
import Cart from "./Cart"

function Main() {

    const [products, setProducts] = React.useState([])

    React.useEffect(() => {


        axios.get("/productos").then(response => {
            setProducts(response.data)
        }).catch(error => {
            console.log("error: ", error)
        })

        axios.get("carritos/obtener_actual").then(response => {
            console.log(response)
        }).catch(error => {
            console.log("error: ", error)
        })


    }, [])

    const productItems = products.map(product => <ProductBox key={product.id} product={product} />)

    return (
        <div className="container">

            <Cart />

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
    ReactDOM.render(<Main />, document.getElementById('content'));
}
