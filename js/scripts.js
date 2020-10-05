const snackSearchForm = document.getElementById( 'search-form' );
const snackSearchInput = document.getElementById( 'search-input' );
const snackResults = document.getElementById( 'search-results' );

snackSearchForm.addEventListener( 'submit', event => {
    event.preventDefault();
    snackResults.innerHTML = '';
    fetch ( `http://localhost:80/api/snacks.php?search=${snackSearchInput.value}` )
        .then( response => response.json() )
        .then( data => {
            for ( let snack of data ) {
                const snackLI = document.createElement( 'LI' );
                snackLI.innerHTML = `
                    <h3>${snack[0]}</h3>
                    <dl>
                        <dt>Type</dt>
                        <dd>${snack[1]}</dd>
                        <dt>Price</dt>
                        <dd>${parseFloat(snack[2]).toFixed(2)}</dd>
                        <dt>Calories</dt>
                        <dd>${snack[3]}</dd>
                    </dl>
                `;
                snackResults.append( snackLI );
            }
        } )

});