import React from 'react';
import CartItem from './CartItem'

function Cart(props) {

    const { cartData, onProductRemoveClick, onCartConfirmClick, onCartDiscardClick } = props

    let itemsCount = 0
    let cartItemsElements = null
    if(cartData && cartData.items.length > 0) {
        cartItemsElements = cartData.items.map(item => {
            itemsCount += item.cantidad
            return <CartItem 
                key={item.id_producto} 
                item={item} 
                onItemRemoveClick={onProductRemoveClick}
            />
        })
    } else {
        cartItemsElements = <tr><td>No hay elementos en el carrito</td></tr>
    }


    return (
        <div style={{marginBottom: 20}}>
            <div className="dropdown" id="cart">
                <button className="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Carrito ({itemsCount})
                </button>
                <div className="dropdown-menu" style={{padding: 20}}>
                    <table className="table table-condensed">
                        <tbody>
                            {cartItemsElements}
                        </tbody>
                    </table>
                    {itemsCount > 0 &&
                        <>
                            <div className="clearfix" style={{marginBottom: 20, fontSize: 18}}>
                                <div style={{float: "left", marginLeft: 20}}>Total:</div>
                                <div style={{float: "right", marginRight: 20}}>${cartData.total}</div>
                            </div>
                            <div style={{paddingLeft: 10, paddingRight: 10}}>
                                <button className="btn btn-secondary" style={{float: "left"}} onClick={onCartDiscardClick}>Descartar</button>
                                <button className="btn btn-success" style={{float: "right"}} onClick={onCartConfirmClick}>Confirmar</button>
                            </div>
                        </>
                    }
                </div>
            </div>
        </div>
    );
}

export default Cart;

