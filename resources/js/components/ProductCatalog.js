import React from 'react';
import ProductBox from "./ProductBox"


function ProductCatalog(props) {

    const { products, filteredCategories, onAddToCartClick, productAddingToCart } = props

    const productItems = products.map(product => {

        if(filteredCategories.length == 0 || filteredCategories.includes(product.id_categoria)) {
            return (
                <ProductBox 
                    key={product.id} 
                    product={product} 
                    onAddToCartClick={() => onAddToCartClick(product)}
                    addingToCart={productAddingToCart == product.id}
                />
            )
        }
        
    })

    return (
        <div className="card">
            <div className="card-body">
                {productItems}
            </div>
        </div>
    );
}

export default ProductCatalog;
