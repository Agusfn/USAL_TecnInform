import React from 'react';


function CartItem(props) {

    const { item, onItemRemoveClick } = props

    const [removing, setRemoving] = React.useState(false)
   
    const removeItem = () => {
        console.log("remove item", item)
        onItemRemoveClick(item.id_producto)
        setRemoving(true)
    }

    // If item is removing and then it changes, stop spinner.
    React.useEffect(() => {
        if(removing) {
            setRemoving(false)
        }
    }, [item])

    return (
        <tr>
            <td><img src={item.imagen_producto} className="cart-item-img" /></td>
            <td>{item.nombre_producto}</td>
            <td>${item.precio_unitario}</td>
            <td>x{item.cantidad}</td>
            <td>${item.total}</td>
            <td>
                {!removing &&
                    <button className="btn btn-sm btn-outline-danger" onClick={removeItem}>x</button>
                }
                {removing && 
                    <i className="fa fa-spinner fa-spin fa-lg fa-fw"></i>
                }
            </td>
        </tr>
    );

}

export default CartItem;

