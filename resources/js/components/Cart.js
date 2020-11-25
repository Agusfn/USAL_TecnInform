import React from 'react';


function Cart(props) {

    //const { product } = props

    return (
        <div style={{marginBottom: 20}}>
            <div className="dropdown">
                <button className="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Carrito (5)
                </button>
                <div className="dropdown-menu">
                    <form className="px-4 py-3">
                        <div className="form-group">
                            <label htmlFor="exampleDropdownFormEmail1">Email address</label>
                            <input type="email" className="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" />
                        </div>
                        <div className="form-group">
                            <label htmlFor="exampleDropdownFormPassword1">Password</label>
                            <input type="password" className="form-control" id="exampleDropdownFormPassword1" placeholder="Password" />
                        </div>
                        <div className="form-group">
                            <div className="form-check">
                                <input type="checkbox" className="form-check-input" id="dropdownCheck" />
                                <label className="form-check-label" htmlFor="dropdownCheck">
                                Remember me
                                </label>
                            </div>
                        </div>
                        <button type="submit" className="btn btn-primary">Sign in</button>
                    </form>
                    <div className="dropdown-divider"></div>
                    <a className="dropdown-item" href="#">New around here? Sign up</a>
                    <a className="dropdown-item" href="#">Forgot password?</a>
                </div>
            </div>
        </div>
    );
}

export default Cart;

