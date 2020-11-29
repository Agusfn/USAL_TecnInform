import React from 'react';


function CategoriesList(props) {

    const { categories, filteredCategories, onFilteredCategoriesChange } = props


    const toggleCategory = category => {
        let filteredCats = filteredCategories.slice()
        if(filteredCats.includes(category.id)) {
            filteredCats = filteredCats.filter(categoryId => categoryId != category.id)
        } else {
            filteredCats.push(category.id)
        }
        onFilteredCategoriesChange(filteredCats)
    }

    const selectAllCategories = () => onFilteredCategoriesChange([])

    const buttons = categories.map(category => {
        return (
            <button 
                key={category.id}
                type="button" 
                className={"btn btn-light" + (filteredCategories.includes(category.id) ? " active" : null)} 
                onClick={() => toggleCategory(category)}
            >
                {category.nombre}
            </button>
        )
    })

    return (
        <div className="card">
            <div className="card-body">
                <h4>Categorías</h4>
                <div className="btn-group-vertical" style={{width: '100%'}} role="group" aria-label="Basic example">
                <button 
                    type="button" 
                    className={"btn btn-light" + (filteredCategories.length == 0 ? " active" : null)}
                    onClick={selectAllCategories}
                >
                    Todas
                </button>
                <>
                    {buttons}
                </>
                </div>
            </div>
        </div>
    );
}

export default CategoriesList;
