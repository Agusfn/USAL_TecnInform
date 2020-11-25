import React from 'react';


function ResultModal(props) {


    return (
    <div className="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div className="modal-dialog" role="document">
        <div className="modal-content">
        <div className="modal-header">
            <h5 className="modal-title" id="exampleModalLabel">Compra exitosa!</h5>
            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div className="modal-body">
            <div style={{textAlign: 'center'}}>
                <div style={{marginBottom: 15, color: "green"}}>
                    <i class="fa fa-check-circle fa-4" style={{fontSize: 100}} aria-hidden="true"></i>
                </div>
                <span>La compra se ha realizado exitosamente!</span>
            </div>
        </div>
        <div className="modal-footer">
            <button type="button" className="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>
    );
}

export default ResultModal;
