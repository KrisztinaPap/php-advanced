const reactRoot = document.getElementById('react-root');

const SearchForm = props => {

    const [search, setSearch] = React.useState( '' );
    const [snacks, setSnacks] = React.useState( [] );

    const submitSearch = event => {
        event.preventDefault();
        fetch( `http://localhost:80/api/snacks.php?search=${search}` )
            .then( response => response.json() )
            .then( data => {
                setSnacks( data );
            } )
            .catch( error => { throw error } );
    }

    return (
        <React.Fragment>
            <h2>Snack Search Form</h2>
            <form onSubmit={submitSearch}>
                <label htmlFor="search">
                    Enter a Search Term:
                    <input 
                        type="search"
                        id="search" 
                        onChange={event => { setSearch( event.target.value ) } }
                        value={search} />
                </label>
                <input 
                    type="submit"
                    value="Search Snacks" />
            </form>
            <h3>Snack Search Results</h3>
            <ul>
                {snacks.map( (snack, index) => (
                    <li key={index}>
                        <h4>{snack[0]}</h4>
                        <dl>
                            <dt>Snack Type:</dt>
                            <dd>{snack[1]}</dd>
                            <dt>Snack Price:</dt>
                            <dd>${parseFloat( snack[2] ).toFixed(2)}</dd>
                            <dt>Snack Calories:</dt>
                            <dd>{snack[3]}</dd>
                        </dl>
                    </li>
                ) )}
            </ul>
        </React.Fragment>
    )
}


ReactDOM.render( <SearchForm />, reactRoot );