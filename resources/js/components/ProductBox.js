import React from 'react';


function ProductBox(props) {

    const { product, onAddToCartClick, addingToCart = false } = props

    return (
        <div className={"product-box"}>
            <img src={product.img_url} />
            <div className="clearfix">
                <div style={{float: "left", height: 46, overflow: "hidden", maxWidth: 120}}>{product.nombre}</div>
                <div style={{float: "right"}}>${Math.round(product.precio)}</div>
            </div>
            <div style={{textAlign: 'center', marginTop: 10}}>
                {!addingToCart &&
                    <button className={"btn btn-primary"} onClick={onAddToCartClick} >Agregar al carrito</button>
                }
                {addingToCart && 
                    <i className="fa fa-spinner fa-spin fa-lg fa-fw"></i>
                }
            </div>
            
        </div>
    );
}

export default ProductBox;
