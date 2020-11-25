import React from 'react';


function ProductBox(props) {

    const { product, onAddToCartClick, addingToCart = false } = props

    return (
        <div className={"product-box"}>
            <img src={"asd"/*product.imagen*/} />
            <div className="row">
                <div className="col-7" style={{height: 46, overflow: "hidden"}}>{product.nombre}</div>
                <div className="col-5">${Math.round(product.precio)}</div>
            </div>
            <div style={{textAlign: 'center', marginTop: 10}}>
                {!addingToCart &&
                    <button className={"btn btn-primary"} onClick={onAddToCartClick} >Agregar al carrito</button>
                }
                {addingToCart && 
                    <div>Loading</div>
                }
            </div>
            
        </div>
    );
}

export default ProductBox;
