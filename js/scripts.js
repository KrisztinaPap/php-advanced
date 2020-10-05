const snackSearchForm = document.getElementById( 'search-form' );
const snackSearchInput = document.getElementById( 'search-input' );
const snackResults = document.getElementById( 'search-results' );

snackSearchForm.addEventListener( 'submit', event => {
    event.preventDefault();
    fetch ( 'http://localhost:80/api/snacks.php' )
        .then( response => response.json() )
        .then( data => {
            console.log( data );
        } )

});